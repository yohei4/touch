import React, { useEffect, useMemo, useRef, useLayoutEffect, useState, useCallback, Ref } from "react";
import ReactDOM from 'react-dom';
import { useDropzone } from 'react-dropzone';
import axios from 'axios';
import Preview from './Preview';
import Converter from '../../Converter';

interface FileUpLoaderProps {
    name: string;
    txt: string;
    max: number;
    required?: boolean;
};

const FileUpLoader = (props: FileUpLoaderProps) => {

    const [photos, setPhotos] = useState([]);
    let newPhotos = [...photos];
    const [key, setKey] = useState(0);
    const dropZoneRef = useRef<HTMLDivElement>(null);
    const inputRef = useRef<HTMLInputElement>(null);

    let { getRootProps, getInputProps, open } = useDropzone({
        accept: 'image/*',
        onDrop: (acceptedFiles) => {
            let newKey = key;
                acceptedFiles.map((file: File, index: number) => {
                    if(props.max > newPhotos.length) {
                        newKey++;
                        newPhotos.push({key: newKey, original: file});
                        setPhotos(newPhotos);
                    }
                })
            setKey(newKey);
        }
    });

    useEffect(() => {
        // max値に達した場合、ドロップエリア不可
        if(props.max == photos.length) {
            dropZoneRef.current.classList.add('disabled');
        }
        // max値に達した場合、ドロップエリア可
        if(props.max > photos.length) {
            dropZoneRef.current.classList.remove('disabled');
        }
    }, [photos]);

    // 初期表示
    const savedFilePreview = (data: any): void => {
    };

    //ファイルの削除
    const deletePhoto = (event: { target: HTMLButtonElement }, index: number): void => {
        newPhotos.splice(index, 1);
        setPhotos(newPhotos);
    };

    return (
        <React.StrictMode>
            <div className="form-item">
                <div className="form-item__lavel">
                    <label className="form-item__lavel--txt" htmlFor={props.name}>{props.txt}</label>
                    { props.required === true ? <span className="form-required"></span> : null }
                </div>
                <div className="form-item__container">
                    <div {...getRootProps({className: 'form-item__dropzone'})} ref={dropZoneRef}>
                        <input {...getInputProps()} ref={inputRef} />
                        <div>
                            <button className="form-item__dropzone__btn" onClick={open}><i className="fas fa-camera"></i><span className="form-item__dropzone__btn--txt">画像を選択する</span></button>
                            <span className="form-item__dropzone--txt">または、ドラッグ&ドロップ</span>
                        </div>
                    </div>
                    <ul className="photo-list">
                        {photos.map((photo: {key: number, original: File, base64: string}, index: number) => {
                            if(props.max > index) {
                                return (<Preview photo={photo} key={photo.key} id={photo.key} onClick={deletePhoto} index={index}/>)
                            }
                        })}
                    </ul>
                </div>
            </div>
        </React.StrictMode>
    )
};

export default FileUpLoader;

