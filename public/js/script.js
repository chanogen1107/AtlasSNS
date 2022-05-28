
$(function () {
  $('.js-menu__item__link').each(function () {
    $(this).on('click', function () {
      $("+.submenu", this).slideToggle();
      return false;
    });
  });
});

$(function () {
  $('.js-menu__item__link').click(function () {        //ハンバーガーボタン（.menu-trigger）をタップすると、
    $('.head-toggle').toggleClass('active');              //タップしたハンバーガーボタン（.menu-trigger）に（.active）を追加・削除する。
  });
  $('.js-menu__item__link ul li a').click(function () { //各メニューリンク（.nav-wrapper ul li a）をタップすると、
    $('.head-toggle').removeClass('active');   //ハンバーガーボタン（.menu-trigger）にある（.active）を削除する。
  });
});

$(".post-trash").on("click", function () {
  if ($(this).hasClass("change")) {
    $(this).attr("src", "../images/trash.png");
    $(this).toggleClass("change");
  } else {
    $(this).attr("src", "../images/trash-h.png");
    $(this).toggleClass("change");
  }
});

$(function(){
  // 編集ボタン(class="js-modal-open")が押されたら発火
  $('.js-modal-open').on('click',function(){
      // モーダルの中身(class="js-modal")の表示
      $('.js-modal').fadeIn();
      // 押されたボタンから投稿内容を取得し変数へ格納
      var post = $(this).attr('post');
      // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
      var post_id = $(this).attr('post_id');

      // 取得した投稿内容をモーダルの中身へ渡す
      $('.modal_post').text(post);
      // 取得した投稿のidをモーダルの中身へ渡す
      $('.modal_id').val(post_id);
      return false;
  });

  // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
  $('.js-modal-close').on('click',function(){
      // モーダルの中身(class="js-modal")を非表示
      $('.js-modal').fadeOut();
      return false;
  });
});