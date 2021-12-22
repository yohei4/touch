import axios from "axios";
import React, { useEffect } from "react";
import { Button, Title, ConfilmItem, Preview } from './index';

interface ConfilmProps {
    formData: any;
};

const Confirm = (props: ConfilmProps) => {
    useEffect(() => {
        console.log(props.formData);
    });

    const onclick = () => {
        axios.post('/restaurant/ajax/save', props.formData)
        .then(function (response) {
            console.log(response.data);
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
                inputData={props.formData.name}
            />
            <ConfilmItem
                id={'add1'}
                label={'住所'}
                inputData={props.formData.add1 + props.formData.add2}
            />
            <ConfilmItem
                id={'add2'}
                label={'建物名・部屋番号'}
                inputData={props.formData.add3}
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
