import React, { useState } from 'react';
import { Welcome, Form1, Form2, Confirm, Finish } from './index';

interface ContentProps {
    setIsOpen(bool: boolean): void;
};

const Content = (props: ContentProps) => {
    //DOM.id
    const [id, setId] = useState(null);

    //ページ数
    const [pageNum, setPageNum] = React.useState(1);

    //フォームデータ
    const [formData, setFormData] = useState({
        restaurant_name: "",
        postal_code: "",
        address_1: "",
        address_2: "",
        address_3: "",
        tel: "",
        logo: {} as object
    });

    //nextBtnのハンドラ
    const next = () :void => {
        if(pageNum !== 5) setPageNum(pageNum + 1);
    };

    //念の為作成
    const prev = () :void => {
        if(pageNum !== 1) setPageNum(pageNum - 1);
    };

    const onClick = () => {

    }

    return (
        <div className="modal-content__inner" id={id}>
            { pageNum == 1 && <Welcome setId={setId} onClick = {() => next()}/>}
            { pageNum == 2 && <Form1 formData={formData} setId={setId} next={next} setFormData={setFormData}/>}
            { pageNum == 3 && <Form2 formData={formData} setId={setId} next={next} setFormData={setFormData}/>}
            { pageNum == 4 && <Confirm formData={formData} next={next}/>}
            { pageNum == 5 && <Finish setIsOpen={props.setIsOpen}/>}
        </div>
    )
};

export default Content;
