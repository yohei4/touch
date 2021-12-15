import React from "react";
import { ModalFormData } from "..";
import {Button, Title, Input, InputFile} from './index';

interface Form2Props {
    modalFormData: any;
    next(): void;
}

const Form2 = (props: Form2Props) => {

    const setModalFormData = (): void => {
        console.log(props.modalFormData);
        const inputList = document.querySelectorAll('.modal-form__input');
        inputList.forEach(el => {
            props.modalFormData[(el as HTMLInputElement).name] = (el as HTMLInputElement).value;
        });
        console.log(props.modalFormData);
    }

    const onClick = (): void => {
        setModalFormData();
        props.next();
    }

    return (
        <React.Fragment>
            <Title
                txt={'店舗ロゴマークを設定してください。'}
            />
            <p>※後で設定することも可能です。</p>
            <InputFile
                name={'logo'}
            />
            <Button
                id={'js-modal_next'}
                txt={'次へ'}
                onClick={() => onClick()}
                type={'submit'}
            />
        </React.Fragment>
    );
}

export default Form2;
