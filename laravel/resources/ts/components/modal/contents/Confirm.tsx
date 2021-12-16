import React, { useEffect } from "react";
import {Button} from './index';

interface ConfilmProps {
    formData: object
};

const Confirm = (props: ConfilmProps) => {
    useEffect(() => {
        console.log(props.formData);
    });

    return (
        <React.Fragment>
            <h1 className="modal-logo"><img src={'images/logo.png'} alt="アプリのロゴ"/></h1>
            <h2 className="modal-head">Touchへようこそ(4)</h2>
            <p className="modal-txt">在庫管理、帳票作成、お店のメニューのカスタマイズを一つのアプリで</p>
            <Button
                id={'js-modal_next'}
                txt={'次へ'}
                onClick={() => console.log("clicked")}
                type={'submit'}
            />
        </React.Fragment>
    )
};

export default Confirm;
