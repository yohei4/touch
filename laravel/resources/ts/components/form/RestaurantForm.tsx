import React, { useCallback, useEffect, useMemo, useRef, useState, useLayoutEffect } from 'react';
import axios from 'axios';
import Const from '../Const';
import ReactDOM from 'react-dom';
import {InputText, InputFile, Select, TextArea, Button} from './index';

const RestaurantInformationForm = () => {

    let csrf_token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const [data, setData] = useState({
        _token:'',
        restaurant_name: '',
        postal_code: '',
        address_1: '',
        address_2: '',
        address_3: '',
        address_4: '',
        tel: '',
        comment: '',
        table_count: '',
        logo: '',
        file_base64: ''
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
        logo: '',
        file_base64: ''
     });

    useEffect(() => {
        axios.get('/api/getRestaurantData').then((res) => {
            console.log('取得成功');
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
            ...data,
            _token: csrf_token
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
                <input type="hidden" name="_token" value={ csrf_token } />
                <InputText
                    id={'restaurant_name'}
                    name={'restaurant_name'}
                    txt={'店舗名'}
                    value={data.restaurant_name}
                    required={true}
                    onChange={handleChange}
                />
                <InputText
                    id={'postal_code'}
                    name={'postal_code'}
                    txt={'郵便番号'}
                    value={data.postal_code}
                    required={true}
                    onChange={handleChange}
                />
                <Select
                    id={'address_1'}
                    name={'address_1'}
                    txt={'都道府県'}
                    value={data.address_1}
                    options={Const.PREF_OPTIONS}
                    required={true}
                    onChange={handleChange}
                />
                <InputText
                    id={'address_2'}
                    name={'address_2'}
                    txt={'市区町村'}
                    value={data.address_2}
                    required={true}
                    onChange={handleChange}
                />
                <InputText
                    id={'address_3'}
                    name={'address_3'}
                    txt={'番地'}
                    value={data.address_3}
                    required={true}
                    onChange={handleChange}
                />
                <InputText
                    id={'address_4'}
                    name={'address_4'}
                    txt={'建物名・部屋番号'}
                    value={data.address_4}
                    onChange={handleChange}
                />
                <InputText
                    id={'tel'}
                    name={'tel'}
                    txt={'電話番号'}
                    value={data.tel}
                    required={true}
                    onChange={handleChange}
                />
                <TextArea
                    id={'comment'}
                    name={'comment'}
                    txt={'お店の説明文'}
                    value={data.comment}
                    rows={5}
                    onChange={handleChange}
                />
                <InputText
                    id={'table_count'}
                    name={'table_count'}
                    txt={'テーブル数'}
                    value={data.table_count}
                    required={true}
                    onChange={handleChange}
                />
                <InputFile
                    name={'logo'}
                    txt={'ロゴ写真'}
                    savedLogo={data.file_base64}
                    value={data.logo}
                    onChange={handleChange}
                    onDelete={handleDelete}
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


// if (document.querySelector('.form-outer')) {
//     ReactDOM.render(<RestaurantInformationForm/>, document.querySelector('.form-outer'));
// }
