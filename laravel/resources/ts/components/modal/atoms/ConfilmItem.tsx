import React, { useState, useRef, useImperativeHandle } from 'react';

interface ConfilmItemProps {
    id: string;
    label: string;
    inputData: string;
}

const ConfilmItem = (props: ConfilmItemProps) => {
    return (
        <div className="confilm-item">
            <label className="confilm-item__label">{props.label}</label>
            <p className="confilm-item__data" id={props.id}>{props.inputData}</p>
        </div>
    )
};

export default ConfilmItem;
