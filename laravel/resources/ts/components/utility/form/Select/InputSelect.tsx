import React from "react";

interface InputSelectProps {
    id: string;
    name: string;
    txt: string;
    options: string[];
    value?: string;
    onChange(event: any): void;
};

const InputSelect = (props: InputSelectProps) => {
    return (
        <React.Fragment>
            <select className="form-select form-control" value={props.value} name={props.name} id={props.id} onChange={e => props.onChange(e)}>
                    <option value=""></option>
                {props.options.map((option, key) => {
                    return (<option key={key} value={option}>{option}</option>);
                })}
                </select>
        </React.Fragment>

    )
}

export default InputSelect;
