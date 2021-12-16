import React, { useState } from 'react';
import { Welcome, Form0, Form1, Form2, Confirm } from './index';

interface ContentProps {

};

const Content = (props: ContentProps) => {
    //DOM.id
    const [id, setId] = useState(null);

    //ページ数
    const [pageNum, setPageNum] = React.useState(1);

    //フォームデータ
    const [formData, setFormData] = useState({
        name: "",
        pCode: "",
        address: "",
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

    return (
        <div className="modal-content__inner" id={id}>
            { pageNum == 1 && <Welcome setId={setId} onClick = {() => next()}/>}
            {/* { pageNum == 2 && <Form0 formData={formData} setId={setId} next={next} setFormData={setFormData}/>} */}
            { pageNum == 2 && <Form1 formData={formData} setId={setId} next={next} setFormData={setFormData}/>}
            { pageNum == 3 && <Form2 formData={formData} setId={setId} next={next} setFormData={setFormData}/>}
            { pageNum == 4 && <Confirm formData={formData}/>}
        </div>
    )
};

export default Content;
