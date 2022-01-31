import React, { forwardRef } from "react";

interface SelectProps {
    name: string;
    txt: string;
    required?: boolean;
};

const Select = forwardRef((props: SelectProps, ref: React.Ref<HTMLSelectElement>) => {
    return (
        <div className="form-item">
            <div className="form-label__outer">
                <label className="form-label" htmlFor={props.name}>{props.txt}</label>
                { props.required === true ? <span className="form-required"></span> : null }
            </div>
            <select ref={ref} className="modal-form__input form-select" name={props.name} id={props.name}>
                <option value="和歌山県">和歌山県</option>
            </select>
        </div>
    )
});

export default Select;
