import React from "react";
import {Button} from './index';

interface WelcomeProps {
    onClick: () => void;
}

const Welcome = (props: WelcomeProps) => {
    return (
        <React.Fragment>
            <h1 className="modal-logo"><img src={'images/logo.png'} alt="アプリのロゴ"/></h1>
            <h2 className="modal-head">Touchへようこそ</h2>
            <p className="modal-txt">在庫管理、帳票作成、お店のメニューのカスタマイズを一つのアプリで</p>
            <Button
                id={'js-modal_next'}
                txt={'次へ'}
                onClick={() => props.onClick()}
                type={'button'}
            />
        </React.Fragment>
    );
}

export default Welcome;
