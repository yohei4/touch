import React, { forwardRef } from "react";

interface TextAreaProps {
    id: string;
    name: string;
    label: string;
    value?: string;
    required?: boolean;
    cols?: number;
    rows?: number;
    onChange(event: any): void;
};

const TextArea = forwardRef((props: TextAreaProps, ref: React.Ref<HTMLTextAreaElement>) => {
    return (
        <React.Fragment>
            <div className="form-item">
                <div className="form-item__label">
                    <label className="form-item__label--txt" htmlFor={props.name}>{props.label}</label>
                    { props.required === true ? <span className="form-required"></span> : null }
                </div>
                <div className="form-item__container">
                    <textarea className="form-textarea form-control" cols={props.cols} rows={props.rows} name={props.name} id={props.id} defaultValue={props.value} placeholder={props.label} onChange={event => props.onChange(event)}></textarea>
                </div>
            </div>
        </React.Fragment>
    )
});

export default TextArea;
