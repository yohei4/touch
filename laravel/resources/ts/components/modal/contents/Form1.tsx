import React, { useRef } from "react";
import {Button, Input, Title} from './index';

interface Form1Props {
    modalFormData: any;
    next(): void;
}

const Form1 = (props: Form1Props) => {

    const setModalForm1Data = () => {
        const inputList = document.querySelectorAll('.modal-form__input');
        inputList.forEach(el => {
            props.modalFormData[(el as HTMLInputElement).name] = (el as HTMLInputElement).value;
            // console.log((el as HTMLInputElement).value);
        });
    }

    const onClick = () => {
        setModalForm1Data();
        props.next();
    }

    return (
        <React.Fragment>
            <Title
                txt={'あなたの店舗情報を入力してください。'}
            />
            <Input
                name={'name'}
                txt={'店舗名'}
                type={'text'}
            />
            <Input
                name={'pCode'}
                txt={'郵便番号'}
                type={'text'}
            />
            <Input
                name={'add1'}
                txt={'住所１'}
                type={'text'}
            />
            <Input
                name={'add2'}
                txt={'住所２'}
                type={'text'}
            />
            <Input
                name={'tel'}
                txt={'TEL'}
                type={'tel'}
            />
            <Button
                id={'js-modal_next'}
                txt={'次へ'}
                onClick={() => onClick()}
                type = {'button'}
            />
        </React.Fragment>
    );
}

export default Form1;
