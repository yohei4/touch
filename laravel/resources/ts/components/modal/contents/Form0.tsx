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
        props.setId('form0');
    });

    const refName = createRef<HTMLInputElement>();

    const onClick = () => {
        props.setFormData({
            ...props.formData,
            name: refName.current.value,
        });
        props.next();
    };

    return (
        <React.Fragment>
            <Title
                txt={'あなたの店舗名を入力してください。'}
            />
            <div className="form-item__outer">
                <Input
                    name={'name'}
                    txt={'店舗名'}
                    type={'text'}
                    ref={refName}
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
