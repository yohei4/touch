import React from "react";
import {Button, Title, Input, InputFile} from './index';


const Form2 = () => {

    return (
        <React.Fragment>
            <Title
                txt={'店舗ロゴマークを設定してください。'}
            />
            <p>※後で設定することも可能です。</p>
            <InputFile
                name={'logo'}
                type={'file'}
            />
            <Button
                id={'js-modal_next'}
                txt={'次へ'}
                onClick={() => console.log("clicked")}
                type={'submit'}
            />
        </React.Fragment>
    );
}

export default Form2;
