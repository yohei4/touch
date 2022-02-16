import React, { useEffect, useState } from 'react';
import axios from 'axios';
import Const from '../Const';
import { InputText, FileUpLoader, Select, TextArea, Button, Loader } from '../index';

const RestaurantInformationForm = () => {

    const [data, setData] = useState({
        restaurant_name: '',
        postal_code: '',
        address_1: '',
        address_2: '',
        address_3: '',
        address_4: '',
        tel: '',
        comment: '',
        table_count: '',
        logo: ''
     });

    const [originData, setOriginData] = useState({
        restaurant_name: '',
        postal_code: '',
        address_1: '',
        address_2: '',
        address_3: '',
        address_4: '',
        tel: '',
        comment: '',
        table_count: '',
        logo: ''
     });

    useEffect(() => {
        axios.get('/info/restaurant-info/ajax/get').then((res) => {
            console.log('取得成功');
            console.log(res.data.data);
            setOriginData(res.data.data);
            setData(res.data.data);
        }).catch((e) => {
            console.log('失敗');
            console.log(e);
        })
    },[]);

    const handleChange = (e: any): void => {
        setData({
            ...data,
            [e.target.name]: e.target.value
        });
    };

    const handleDelete = (key: string): void => {
        setData({
            ...data,
            [key]: ''
        });
    };

    const handleSubmit = () => {
        setData({
            ...data
        });
        console.log(data);
        axios.post('/info/restaurant-information/update', data).then(res => {
            console.log(res);
            console.log('更新成功');
        }).catch(error => {
            console.log(error);
            console.log('更新失敗');
        });
    }

    return (
        <React.Fragment>
            <form id="restaurant-information" className="form" onSubmit={() => handleSubmit()}>
                <Loader/>
                <InputText
                    id={'restaurant_name'}
                    name={'restaurant_name'}
                    label={'店舗名'}
                    value={data.restaurant_name}
                    required={true}
                    onChange={handleChange}
                />
                <InputText
                    id={'postal_code'}
                    name={'postal_code'}
                    label={'郵便番号'}
                    value={data.postal_code}
                    required={true}
                    onChange={handleChange}
                />
                <Select
                    id={'address_1'}
                    name={'address_1'}
                    label={'都道府県'}
                    value={data.address_1}
                    options={Const.PREF_OPTIONS}
                    required={true}
                    onChange={handleChange}
                />
                <InputText
                    id={'address_2'}
                    name={'address_2'}
                    label={'市区町村'}
                    value={data.address_2}
                    required={true}
                    onChange={handleChange}
                />
                <InputText
                    id={'address_3'}
                    name={'address_3'}
                    label={'番地'}
                    value={data.address_3}
                    required={true}
                    onChange={handleChange}
                />
                <InputText
                    id={'address_4'}
                    name={'address_4'}
                    label={'建物名・部屋番号'}
                    value={data.address_4}
                    onChange={handleChange}
                />
                <InputText
                    id={'tel'}
                    name={'tel'}
                    label={'電話番号'}
                    value={data.tel}
                    required={true}
                    onChange={handleChange}
                />
                <TextArea
                    id={'comment'}
                    name={'comment'}
                    label={'お店の説明文'}
                    value={data.comment}
                    rows={5}
                    onChange={handleChange}
                />
                <InputText
                    id={'table_count'}
                    name={'table_count'}
                    label={'テーブル数'}
                    value={data.table_count}
                    required={true}
                    onChange={handleChange}
                />
                <FileUpLoader
                    name={'logo'}
                    label={'ロゴ写真(最大1枚)'}
                    max={1}
                    // value={data.logo}
                />
                <div className="form-item">
                    <Button
                        id={'form-btn'}
                        type={'submit'}
                        txt={'変更を更新'}
                    />
                </div>
            </form>
        </React.Fragment>
    )
}

export default RestaurantInformationForm;
