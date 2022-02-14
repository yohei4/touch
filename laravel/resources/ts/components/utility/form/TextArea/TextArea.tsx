import React, { useEffect, useState } from "react";
import InputArea from "./InputArea";

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

    const [TextArea, setTextArea] = useState(props.value);

    useEffect(() => {
        setTextArea(props.value);
    },[TextArea]);


    const handleChange = (e: any): void => {
        setTextArea(e.target.value);
    };

    return (
        <React.Fragment>
            <div className="form-item">
                <div className="form-item__label">
                    <label className="form-item__label--txt" htmlFor={props.name}>{props.txt}</label>
                    { props.required === true ? <span className="form-required"></span> : null }
                </div>
                <div className="form-item__container">
                    <InputArea
                        name={props.name}
                        id={props.id}
                        txt={props.txt}
                        value={props.value}
                        cols={props.cols}
                        rows={props.rows}
                        onChange={handleChange}
                    />
                </div>
            </div>
        </React.Fragment>
    )
};

export default TextArea;
