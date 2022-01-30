import React, { createRef, useEffect, forwardRef } from "react";
import {Button, Title, InputFile, Preview} from './index';

interface Form2Props {
    formData: any;
    setFormData(object: object): void;
    next(): void;
    setId(id: string): void;
};

const Form2 = (props: Form2Props) => {
    useEffect(() => {
        props.setId('form2');
    });

    const refLogo = createRef<HTMLInputElement>();

    const onClick = (): void => {
        props.setFormData({
            ...props.formData,
            logo: refLogo.current.files[0] != undefined ? refLogo.current.files[0] : ''
        });
        props.next();
    };

    return (
        <React.Fragment>
            <Title
                txt={'店舗ロゴマークを設定してください。'}
            />
            <p>※後で設定することも可能です。</p>
            <div className="form-item">
                <InputFile
                    name={'logo'}
                    ref={refLogo}
                />
            </div>
            <Button
                id={'js-modal_next'}
                txt={'次へ'}
                onClick={() => onClick()}
                type={'submit'}
            />
        </React.Fragment>
    )
};

export default Form2;
