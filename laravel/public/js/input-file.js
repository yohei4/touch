class inputFile {
    constructor() {
        this.summaryMenu = document.querySelector('.summary-menu');
        this.summaryBtn = document.querySelectorAll('.summary-menu__btn');
    }

    init() {
        this.#_btnActive();
        this.#_attachEvent();
    }
}
