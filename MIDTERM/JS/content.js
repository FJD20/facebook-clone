$(document).ready(function () {
    function load_content() {
        let data = {
            'view_content': true
        };

        $.ajax({
            type: "POST",
            url: "Code/Content/content_fetch.php",
            data: data,
            dataType: "json",
            success: function (response) {
                console.log(response);

                if (Array.isArray(response)) {

                    response.forEach(function (value) {
                        let imagesHTML = '';

                     
                        console.log(value.content.imagePost);

                        try {
                            var images = JSON.parse(value.content.imagePost);

                            images.forEach(function (imagePost, index) {
                                imagesHTML += '<div class="image-item" data-index="' + index + '"' + (index === 0 ? ' style="display:block;"' : ' style="display:none;"') + '><img src="./Code/Content/uploads/' + imagePost + '" alt="Posted Image"></div>';
                            });
                        } catch (e) {
                            console.error('Invalid JSON format for imagePost:', value.content.imagePost);
                            return;
                        }

                        let postHtml = `
                            <div class="users_Posts">
                                <div class="usrsP_1">
                                    <div class="usrsp1left">
                                        <div class="usrsp1left_01">
                                            <img src="${value.content.profile_picture}" alt="Profile">
                                        </div>
                                        <div class="usrsp1left_02">
                                            <p>${value.content.firstname} ${value.content.lastname}</p>
                                            <span>${value.content.created_at} &#183; <i class='fa-solid fa-user-group'></i></span>
                                        </div>
                                    </div>
                                    <div class="usrsp1right">
                                        <div class="usrsp1right_icon">
                                            <i class="fa-solid fa-ellipsis"></i>
                                            <div class="usrsp_options">
                                                <p class="edit-btn" data-post-id="${value.content.post_id}">Edit</p>
                                                <p class="delete-btn" data-post-id="${value.content.post_id}">Delete</p>
                                            </div>
                                            <div class="triangle"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="usrsP_caption">
                                    <p>${value.content.caption}</p>
                                </div>
                                <div class="usrsP_imagePosted post-images-wrapper">
                                    <button class="nav-btn left-btn">←</button>
                                    <div class="post-images d-flex flex-wrap">
                                        ${imagesHTML}
                                    </div>
                                    <button class="nav-btn right-btn">→</button>
                                </div>
                                <div class="usrsP_activities">
                                    <div class="usrsP_like" value="${value.content.post_id}">
                                      <input type="hidden" class="content_id" value="${value.content.post_id}"></input>
                                    <input type="hidden" class="poster_id" value="${value.content.user_id}"></input>
                                    <p>${value.content.content_like}</p>
                                        <i class='bx bx-like'></i>
                                        <p>Like</p>
                                    </div>
                                    <div class="usrsP_ comment" onclick="popupCommentModal(${value.content.post_id})">
                                        <i class="fa-regular fa-comment"></i>
                                        <p>Comment</p>
                                    </div>
                                    <div class="usrsP_ share">
                                        <i class='bx bx-share'></i>
                                        <p>Share</p>
                                    </div>
                                </div>
                                <div class="usrsP_comment">
                                    <div class="usrspcomL">
                                        <img src="${value.content.profile_picture}" alt="Profile Image">
                                    </div>
                                    <div class="usrspcomR">
                                        <form action="add_comment.php" class="commentForm" method="post">
                                            <input type="hidden" name="post_id" value="${value.content.post_id}">
                                            <input type="text" name="comment" placeholder="Comment as ${value.content.firstname} ${value.content.lastname}">
                                            <button type="submit" class="commentBtn"><i class="fa-regular fa-paper-plane"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>`;

                        $(".users_Followers").after(postHtml);
                    });

                    $('.left-btn').on('click', function () {
                        navigateImages($(this).siblings('.post-images'), -1);
                    });

                    $('.right-btn').on('click', function () {
                        navigateImages($(this).siblings('.post-images'), 1);
                    });

                    $(document).on('keydown', function (event) {
                        if (event.key === 'ArrowLeft') {
                            $('.left-btn:visible').click();
                        } else if (event.key === 'ArrowRight') {
                            $('.right-btn:visible').click();
                        }
                    });
                } else {
                    console.log('Invalid response format.');
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    }

    function navigateImages($container, direction) {
        const $images = $container.find('.image-item');
        const totalImages = $images.length;
        let currentIndex = $images.filter(':visible').data('index') || 0;

        $images.hide();

        let newIndex = currentIndex + direction;
        if (newIndex < 0) {
            newIndex = totalImages - 1;
        } else if (newIndex >= totalImages) {
            newIndex = 0;
        }

        $images.eq(newIndex).show();
    }

    load_content();

    $(document).on('click','.usrsP_activities',function (e) {
        e.preventDefault();

        let click = $(this);
        let poster_id = click.closest('.usrsP_activities').find('.poster_id').val();
        let content_id = click.closest('.usrsP_activities').find('.content_id').val();
        let data = {
            'poster_id':poster_id,
            'content_id':content_id,
            'like_btn':true
        }
        // console.log(content_id);
        // console.log(poster_id);
        $.ajax({
            type: "POST",
            url: "Code/Content/content_like.php",
            data: data,
            success: function (response) {
                console.log(response);
            }
        });
        
        
    });
});
