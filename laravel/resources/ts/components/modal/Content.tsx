import React, { useEffect } from 'react';
import {Welcome, Form1, Form2, Confirm, ModalFormData} from './index';

interface ContentProps {

}

const Content = (props: ContentProps) => {
    const [pageNum, setPageNum] = React.useState(1);
    const idList: string[] = ["welcome", "form1", "form2", "confilm"];
    // const idList: string[] = ["form2"];

    const next = () :void => {
        if(pageNum !== 4) setPageNum(pageNum + 1);
    }

    const prev = () :void => {
        if(pageNum !== 1) setPageNum(pageNum - 1);
    }

    return (
        <div className="modal-content__inner" id={idList[pageNum - 1]}>
            { pageNum === 1 && <Welcome onClick = {() => next()}/>}
            { pageNum === 2 && <Form1 next={next} modalFormData={ModalFormData}/>}
            { pageNum === 3 && <Form2 />}
            { pageNum === 4 && <Confirm />}
        </div>
    )
}

export default Content;
