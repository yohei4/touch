import React, { useEffect } from "react";
import {Button} from './index';

interface WelcomeProps {
    setId(id: string): void;
    onClick: () => void;
};

const Welcome = (props: WelcomeProps) => {
    useEffect(() => {
        props.setId('welcome');
    });

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
    )
};

export default Welcome;
