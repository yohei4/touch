import axios from "axios";
import React, { createRef, useEffect, useMemo } from "react";
import {Button, Input, Title, Select } from './index';

import UIkit from 'uikit';

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

    const aryref: any = {
        restaurant_name: createRef<HTMLInputElement>(),
        postal_code: createRef<HTMLInputElement>(),
        address_1: createRef<HTMLInputElement>(),
        address_2: createRef<HTMLInputElement>(),
        address_3: createRef<HTMLInputElement>(),
        address_4: createRef<HTMLInputElement>(),
        tel: createRef<HTMLInputElement>()
    }

    const onClick = () => {
        const fd = new FormData();
        setFd(fd);
        axios.post('/restaurant/ajax/validation1', fd)
        .then(response => {
            const data = response.data.data;
            const errors = response.data.errors;
            const status = response.data.status;

            if(status == 'error') {
                let error = '';
                Object.keys(errors).forEach(key => {
                    error += errors[key][0] + '<br>';
                });
            } else {
                props.setFormData({
                    ...props.formData,
                    restaurant_name: data['restaurant_name'],
                    postal_code: data['postal_code'],
                    address_1: data['address_1'],
                    address_2: data['address_2'],
                    address_3: data['address_3'],
                    address_4: data['address_3'],
                    tel: data['tel'],
                });
                props.next();
            }
        })
        .catch(error => {
            console.log(error.response.data.errors);
        });
    };

    const setFd = (fd: FormData) => {
        Object.keys(aryref).forEach(key => {
            fd.append(key, aryref[key].current.value)
        });
    }

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
                        ref={aryref.restaurant_name}
                        required={true}
                    />
                </div>
                <div className="form-item__outer">
                    <Input
                        name={'pCode'}
                        txt={'郵便番号'}
                        type={'text'}
                        ref={aryref.postal_code}
                        required={true}
                    />
                    <Select
                        name={'addr1'}
                        txt={'都道府県'}
                        ref={aryref.address_1}
                        required={true}
                    />
                    <Input
                        name={'addr2'}
                        txt={'市区町村'}
                        type={'text'}
                        ref={aryref.address_2}
                        required={true}
                    />
                    <Input
                        name={'addr3'}
                        txt={'番地'}
                        type={'text'}
                        ref={aryref.address_3}
                        required={true}
                    />
                    <Input
                        name={'addr4'}
                        txt={'建物名・部屋番号'}
                        type={'text'}
                        ref={aryref.address_4}
                    />
                </div>
                <div className="form-item__outer">
                    <Input
                        name={'tel'}
                        txt={'電話番号'}
                        type={'tel'}
                        ref={aryref.tel}
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
