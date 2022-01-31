import React, { forwardRef } from "react";

interface InputProps {
    id: string;
    name: string;
    txt: string;
    value?: string;
    required?: boolean;
    cols?: number;
    rows?: number;
    onChange(event: any): void;
};

const TextArea = (props: InputProps) => {
    return (
        <div className="form-item">
            <div className="form-label__outer">
                <label className="form-label" htmlFor={props.name}>{props.txt}</label>
                { props.required === true ? <span className="form-required"></span> : null }
            </div>
            <textarea className="form-textarea form-control" cols={props.cols} rows={props.rows} name={props.name} id={props.id} defaultValue={props.value} placeholder={props.txt} onChange={event => props.onChange(event)}></textarea>
            { props.id === 'postal_code' ? <button className="ajaxzip3" type="button">郵便番号から住所取得</button> : null }
        </div>
    )
};

export default TextArea;
