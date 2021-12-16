import React, { createRef, useEffect } from "react";
import {Button, Input, Title, Select } from './index';

interface Form1Props {
    formData: any;
    setFormData(object: any): void;
    next(): void;
    setId(id: string): void;
}

const Form1 = (props: Form1Props) => {
    useEffect(() => {
        props.setId('form1');
    });

    const refName = createRef<HTMLInputElement>();
    const refPCode = createRef<HTMLInputElement>();
    const refAdd1 = createRef<HTMLSelectElement>();
    const refAdd2 = createRef<HTMLInputElement>();
    const refAdd3 = createRef<HTMLInputElement>();
    const refAdd4 = createRef<HTMLInputElement>();
    const refTel = createRef<HTMLInputElement>();

    const onClick = () => {
        props.setFormData({
            ...props.formData,
            name: refName.current.value,
            pCode: refPCode.current.value,
            address: refAdd1.current.value + refAdd2.current.value + refAdd3.current.value + refAdd4.current.value,
            tel: refTel.current.value,
        });
        props.next();
    };

    return (
        <React.Fragment>
            <Title
                txt={'あなたの店舗情報を入力してください。'}
            />
            <div className="form-item__outer">
                <Input
                    name={'name'}
                    txt={'店舗名'}
                    type={'text'}
                    ref={refName}
                />
            </div>
            <div className="form-item__outer">
                <Input
                    name={'pCode'}
                    txt={'郵便番号'}
                    type={'text'}
                    ref={refPCode}
                />
                <Select
                    name={'add1'}
                    txt={'都道府県'}
                    ref={refAdd1}
                />
                <Input
                    name={'add2'}
                    txt={'市区町村'}
                    type={'text'}
                    ref={refAdd2}
                />
            </div>
            <div className="form-item__outer">
                <Input
                    name={'add3'}
                    txt={'番地'}
                    type={'text'}
                    ref={refAdd3}
                />
                <Input
                    name={'add4'}
                    txt={'建物名・部屋番号'}
                    type={'text'}
                    ref={refAdd4}
                />
            </div>
            <div className="form-item__outer">
                <Input
                    name={'tel'}
                    txt={'電話番号'}
                    type={'tel'}
                    ref={refTel}
                />
            </div>
            <Button
                id={'js-modal_next'}
                txt={'次へ'}
                onClick={() => onClick()}
                type = {'button'}
            />
        </React.Fragment>
    )
};

export default Form1;
