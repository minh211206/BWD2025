document.addEventListener('DOMContentLoaded', function() {
    // Toggle hamburger menu
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('nav-menu');
    hamburger.addEventListener('click', () => {
        navMenu.classList.toggle('active');
        hamburger.classList.toggle('active');
    });

    // Toggle submenu on mobile
    document.querySelectorAll('.dropdown > a').forEach(dropdown => {
        dropdown.addEventListener('click', (e) => {
            if (window.innerWidth <= 1024) {
                e.preventDefault();
                const submenu = dropdown.nextElementSibling;
                submenu.classList.toggle('show');
            }
        });
    });

    // Toggle user dropdown on mobile
    document.querySelectorAll('.auth-link .dropdown-toggle').forEach(dropdown => {
        dropdown.addEventListener('click', (e) => {
            if (window.innerWidth <= 1024) {
                e.preventDefault();
                const parentDropdown = dropdown.closest('.dropdown');
                parentDropdown.classList.toggle('active');
            }
        });
    });

    // Search functionality
    const searchInput = document.getElementById('searchInput');
    const postsContainer = document.getElementById('postsContainer');
    searchInput.addEventListener('input', () => {
        const searchTerm = searchInput.value.trim().toLowerCase();
        const posts = postsContainer.getElementsByClassName('post');

        Array.from(posts).forEach(post => {
            const content = post.querySelector('p').textContent.toLowerCase();
            if (searchTerm === '' || content.includes(searchTerm)) {
                post.style.display = 'block';
            } else {
                post.style.display = 'none';
            }
        });
    });

    // Handle post submission
    document.getElementById('createPostForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        console.log('FormData:', Array.from(formData.entries()));

        fetch('congdong.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            console.log('Response status:', response.status);
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);
            if (data.success) {
                alert(data.message);
                location.reload();
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Lỗi:', error);
            alert('Có lỗi xảy ra khi đăng bài!');
        });
    });

    // Xử lý nút thích
    document.querySelectorAll('.like-post-btn').forEach(button => {
        button.addEventListener('click', function() {
            const postId = this.getAttribute('data-post-id');
            const isLiked = this.classList.contains('liked');
            const formData = new FormData();
            formData.append('action', 'like');
            formData.append('post_id', postId);

            fetch('congdong.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    const likeCountSpan = this.closest('.post').querySelector('.like-count');
                    likeCountSpan.textContent = `${data.like_count} lượt thích`;
                    if (data.action === 'like') {
                        this.classList.add('liked');
                        this.querySelector('span').textContent = 'Bỏ thích';
                    } else {
                        this.classList.remove('liked');
                        this.querySelector('span').textContent = 'Thích';
                    }
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Lỗi:', error);
                alert('Có lỗi xảy ra khi thích bài!');
            });
        });
    });

    // Xử lý nút xóa bài viết
    document.querySelectorAll('.delete-post-btn').forEach(button => {
        button.addEventListener('click', function() {
            const postId = this.getAttribute('data-post-id');
            if (confirm('Bạn có chắc muốn xóa bài viết này?')) {
                const formData = new FormData();
                formData.append('action', 'delete');
                formData.append('post_id', postId);

                fetch('congdong.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        this.closest('.post').remove();
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('Lỗi:', error);
                    alert('Có lỗi xảy ra khi xóa bài!');
                });
            }
        });
    });

    // Xử lý gửi bình luận
    document.querySelectorAll('.comment-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const postId = this.getAttribute('data-post-id');
            const commentContent = this.querySelector('textarea[name="commentContent"]').value.trim();
            if (!commentContent) {
                alert('Vui lòng nhập nội dung bình luận!');
                return;
            }

            const formData = new FormData();
            formData.append('action', 'comment');
            formData.append('post_id', postId);
            formData.append('commentContent', commentContent);

            fetch('congdong.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    const commentsSection = this.closest('.comments');
                    const noComments = commentsSection.querySelector('p');
                    if (noComments && noComments.textContent === 'Chưa có bình luận nào.') {
                        noComments.remove();
                    }
                    const newComment = document.createElement('div');
                    newComment.classList.add('comment');
                    newComment.setAttribute('data-comment-id', data.comment.id);
                    newComment.innerHTML = `
                        <p><strong>${data.comment.username}</strong>: ${data.comment.content}</p>
                        <small>${data.comment.created_at}</small>
                        <button class='delete-comment-btn' data-comment-id='${data.comment.id}'>Xóa</button>
                    `;
                    commentsSection.insertBefore(newComment, this);
                    this.querySelector('textarea').value = '';
                    alert(data.message);
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Lỗi:', error);
                alert('Có lỗi xảy ra khi gửi bình luận!');
            });
        });
    });

    // Xử lý xóa bình luận
    document.querySelectorAll('.delete-comment-btn').forEach(button => {
        button.addEventListener('click', function() {
            const commentId = this.getAttribute('data-comment-id');
            if (confirm('Bạn có chắc muốn xóa bình luận này?')) {
                const formData = new FormData();
                formData.append('action', 'delete_comment');
                formData.append('comment_id', commentId);

                fetch('congdong.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        this.closest('.comment').remove();
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('Lỗi:', error);
                    alert('Có lỗi xảy ra khi xóa bình luận!');
                });
            }
        });
    });
});