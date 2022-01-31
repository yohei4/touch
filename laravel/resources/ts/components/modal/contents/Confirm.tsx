import axios from "axios";
import React, { useEffect } from "react";
import { Button, Title, ConfilmItem, Preview } from './index';

interface ConfilmProps {
    formData: any;
    next(): void;
};

const Confirm = (props: ConfilmProps) => {
    useEffect(() => {
        console.log(props.formData);
    });

    const onclick = () => {
        const fd = new FormData();
        setFd(fd);
        axios.post('/restaurant/ajax/save', fd)
        .then(function (response) {
            console.log(response.data);
        })
        .catch((error) => {
            console.log(error.response);
        })
        props.next();
    };

    const setFd = (fd: FormData): void => {
        console.log(props.formData);
        Object.keys(props.formData).forEach(key => {
            fd.append(key, props.formData[key]);
        });
    }

    return (
        <React.Fragment>
            <Title
                txt={'以下の内容で登録してもよろしいでしょうか？'}
            />
            <ConfilmItem
                id={'name'}
                label={'店舗名'}
                inputData={props.formData.restaurant_name}
            />
            <ConfilmItem
                id={'pCode'}
                label={'郵便番号'}
                inputData={props.formData.postal_code}
            />
            <ConfilmItem
                id={'addr1'}
                label={'都道府県'}
                inputData={props.formData.address_1}
            />
            <ConfilmItem
                id={'addr2'}
                label={'市区町村'}
                inputData={props.formData.address_2}
            />
            <ConfilmItem
                id={'addr3'}
                label={'番地'}
                inputData={props.formData.address_3}
            />
            <ConfilmItem
                id={'addr4'}
                label={'建物名・部屋番号'}
                inputData={props.formData.address_4}
            />
            <ConfilmItem
                id={'tel'}
                label={'電話番号'}
                inputData={props.formData.tel}
            />
            {/* <Preview
                logo={props.formData.logo}
            /> */}
            <Button
                id={'js-modal_next'}
                txt={'次へ'}
                onClick={() => onclick()}
                type={'submit'}
            />
        </React.Fragment>
    )
};

export default Confirm;
