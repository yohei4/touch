class SummaryTab {
    constructor() {
        this.summaryMenu = document.querySelector('.summary-menu');
        this.summaryBtn = document.querySelectorAll('.summary-menu__btn');
    }

    init() {
        this.#_btnActive();
        this.#_attachEvent();
    }

    #_attachEvent() {
        for(const button of this.summaryBtn) {
            button.addEventListener('click', (e) => {
              let id = button.getAttribute('data-sectionid');
              this.#_summaryBtnClick(id, e);
            });
        }
    }

    #_hideContents(id, e) {
        //クリックしたタブ、パネルの親を取得
        const panelParent = document.querySelector(`#${id}`).closest('.detail-menu');
        //表示状態のボタン、パネルの状態を取得
        const activeBtn = this.summaryMenu.querySelector('.summary-menu__btn[aria-selected="true"]');
        const activePanel = panelParent.querySelector('.detail-menu__section[aria-hidden="false"]');
        //タブボタン
        activeBtn.setAttribute('aria-selected', 'false');
        activeBtn.setAttribute('aria-expanded', 'false');
        //タブパネル
        activePanel.setAttribute('aria-hidden', 'true');
    }

    #_showContent(id, e) {
    //タブボタン
    const btn = e.target.closest('.summary-menu__btn');
    btn.setAttribute('aria-selected', 'true');
    btn.closest('.summary-menu__btn').setAttribute('aria-expanded', 'true');
    //タブパネル
    document.querySelector(`#${id}`).setAttribute('aria-hidden', 'false');
    }

    #_btnActive() {
        const sectionName = this.#_getUrlPart(3);
        const btn = this.summaryMenu.querySelector(`.summary-menu__btn[data-sectionid="${sectionName}"]`);
        const panel = document.querySelector(`#${sectionName}`);
        btn.setAttribute('aria-selected', 'true');
        btn.setAttribute('aria-expanded', 'true');
        panel.setAttribute('aria-hidden', 'false');
    }

    #_getUrlPart(num) {
        const url = location.href.split("/");
        return url[num];
    }

    #_summaryBtnClick(id, e) {
        this.#_hideContents(id, e);
        this.#_showContent(id, e);
    }
}
