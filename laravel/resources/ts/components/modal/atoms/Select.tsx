import React, { forwardRef } from "react";

interface SelectProps {
    name: string;
    txt: string;
};

const Select = forwardRef((props: SelectProps, ref: React.Ref<HTMLSelectElement>) => {
    return (
        <div className="modal-form__item">
            <label className="modal-form__label" htmlFor={props.name}>{props.txt}</label>
            <select ref={ref} className="modal-form__input form-select" name={props.name} id={props.name}>
                <option value="和歌山県">和歌山県</option>
            </select>
        </div>
    )
});

export default Select;
