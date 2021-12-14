/**
 * ポップアップを開く
 *
 * @return void
 */
function modal() {
    const modal = document.querySelector('#modal');
    if(!modal) return;
    console.log(modal);
    modal.classList.add('js-show__modal');

    var blackBg = document.getElementById('js-black__bg');
    var closeBtn = document.getElementById('js-close__btn');

    //スクロール禁止
    document.addEventListener('touchmove', handleTouchMove, { passive: false });
    document.addEventListener('mousewheel', handleTouchMove, { passive: false });

    closePopUp(blackBg, modal);
    closePopUp(closeBtn, modal);

    /**
     * ポップアップを閉じる
     *
     * @param {*} elem
     * @param {*} modal
     * @return void
     */
    function closePopUp(elem, modal) {
        if(!elem) return;
        elem.addEventListener('click', function() {
        modal.classList.remove('js-show__modal');
        //スクロール禁止解除
        document.removeEventListener('touchmove', handleTouchMove, { passive: true });
        document.removeEventListener('mousewheel', handleTouchMove, { passive: true });
    })};

    function nextPopUp(elem, modal) {
        if(!elem) return;
        elem.addEventListener('click', function() {
        modal.classList.remove('js-show__modal');
    })};

    function handleTouchMove(event) {
        event.preventDefault();
    }
}
