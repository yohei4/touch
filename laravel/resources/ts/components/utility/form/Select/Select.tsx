import React, { useEffect, useState } from "react";
import InputSelect from './InputSelect';

interface SelectProps {
    id: string;
    name: string;
    txt: string;
    options: string[];
    value?: string;
    required?: boolean;
    onChange(event: any): void;
};

const Select = React.memo((props: SelectProps) => {

    const [select, setSelect] = useState(props.value);

    useEffect(() => {
        setSelect(props.value);
    },[select]);


    const handleChange = (e: any): void => {
        setSelect(e.target.value);
    };

    return (
        <div className="form-item">
            <div className="form-item__label">
                <label className="form-item__label--txt" htmlFor={props.name}>{props.txt}</label>
                { props.required === true ? <span className="form-required"></span> : null }
            </div>
            <div className="form-item__container">
                <InputSelect
                    name={props.name}
                    id={props.id}
                    txt={props.txt}
                    options={props.options}
                    value={props.value}
                    onChange={handleChange}
                />
            </div>
        </div>
    )
});

export default Select;
