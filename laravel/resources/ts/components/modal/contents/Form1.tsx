import axios from "axios";
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
    const refAdd1 = createRef<HTMLInputElement>();
    const refAdd2 = createRef<HTMLInputElement>();
    const refAdd3 = createRef<HTMLInputElement>();
    const refTel = createRef<HTMLInputElement>();

    const onClick = () => {
        const fd = new FormData();
        setFd(fd);
        axios.post('/restaurant/ajax/validation1', fd)
        .then(response => {
            console.log(response);
            props.setFormData({
                ...props.formData,
                name: response.data.restaurant_name,
                pCode: response.data.postal_code,
                add1: response.data.address_1,
                add2: response.data.address_2,
                add3: response.data.address_3,
                tel: response.data.tel,
            });
            props.next();
        })
        .catch(error => {
            console.log(error.response.data.errors);
        });
    };

    const setFd = (fd: FormData) => {
        fd.append('restaurant_name', refName.current.value);
        fd.append('postal_code', refPCode.current.value);
        fd.append('address_1', refAdd1.current.value);
        fd.append('address_2', refAdd2.current.value);
        fd.append('address_3', refAdd3.current.value);
        fd.append('tel', refTel.current.value);
    };

    return (
        <React.Fragment>
            <Title
                txt={'あなたの店舗情報を入力してください。'}
            />
            <div className="modal-form__content">
                <div className="form-item__outer">
                    <Input
                        name={'name'}
                        txt={'店舗名'}
                        type={'text'}
                        ref={refName}
                        required={true}
                    />
                </div>
                <div className="form-item__outer">
                    <Input
                        name={'pCode'}
                        txt={'郵便番号'}
                        type={'text'}
                        ref={refPCode}
                        required={true}
                    />
                    <Input
                        name={'add1'}
                        txt={'都道府県・市区町村'}
                        type={'text'}
                        ref={refAdd1}
                        required={true}
                    />
                    <Input
                        name={'add2'}
                        txt={'番地'}
                        type={'text'}
                        ref={refAdd2}
                        required={true}
                    />
                    <Input
                        name={'add3'}
                        txt={'建物名・部屋番号'}
                        type={'text'}
                        ref={refAdd3}
                    />
                </div>
                <div className="form-item__outer">
                    <Input
                        name={'tel'}
                        txt={'電話番号'}
                        type={'tel'}
                        ref={refTel}
                        required={true}
                    />
                </div>
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
