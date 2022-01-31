import React, { useEffect, useMemo, useRef, useLayoutEffect } from "react";
import axios from 'axios';

interface InputFileProps {
    name: string;
    txt: string;
    savedLogo?: string;
    value?: string;
    required?: boolean;
    onChange(event: any): void;
    onDelete(key: any): void;
};

const InputFile = (props: InputFileProps) => {

    const defaultFileName = '選択されていません';
    const defaultDnd = 'images/dnd.jpg';
    const [fileName, setFileName] = React.useState(defaultFileName);
    const refLogo = useRef<HTMLInputElement>();
    const clearBtn = useRef(null);
    const canvas = useRef(null);

    // 初期表示時のみ、有効
    useEffect(() => {
        if(props.savedLogo) savedFilePreview(props.savedLogo);
    },[props.savedLogo]);

    // 初期表示
    const savedFilePreview = (data: any): void => {
        // ファイル名の初期表示時
        setFileName('保存済みのロゴです。');

        // base64 → blob(file)
        const blob = toBlob(data);
        previewImage(blob);
    }

    //ファイル選択
    const selectFile = (e: any): void => {
        const files = e.target.files;
        props.onChange(e);
        if(files.length > 0) {
            const file = files[0];
            setFileName(file.name);
            previewImage(file);
            clearBtnView();
        }
    };

    // base64→Blob
    const toBlob = (base64: string) =>  {
        var bin = atob(base64.replace(/^.*,/, ''));
        var buffer = new Uint8Array(bin.length);
        for (var i = 0; i < bin.length; i++) {
            buffer[i] = bin.charCodeAt(i);
        }
        try{
            var blob = new Blob([buffer.buffer], {
                type: 'image/jpg'
            });
        }catch (e){
            return false;
        }
        return blob;
    }

    //画像ファイルを表示
    const previewImage = (file: any): void => {
        const reader = new FileReader();
        const ctx = canvas.current.getContext('2d');
        const image = new Image() as HTMLImageElement;
        reader.onload = (function() {
            image.src = reader.result.toString();
            image.onload = (function () {
                canvas.current.width = image.width;
                canvas.current.height = image.height;
                ctx.drawImage(image, 0, 0);
            });
        });
        reader.readAsDataURL(file);
    };

    //画像ファイルを非表示
    const hideImage = (): void => {
        const ctx = canvas.current.getContext('2d');
        ctx.clearRect(0, 0, canvas.current.width, canvas.current.height);
    };

    //ファイルの削除
    const deleteFlieName = (): void => {
        setFileName(defaultFileName);
        console.log(refLogo.current.value);
        refLogo.current.value = '';
    };

    //キャンセルボタン表示
    const clearBtnView = (): void => {
        clearBtn.current.classList.add('view');
    };

    //クリアボタンのクリックイベント
    const clearBtnClick = (e: any): void => {
        deleteFlieName();
        clearBtn.current.classList.remove('view');
        hideImage();
        props.onDelete(refLogo.current.id);
    };

    //参照ボタンのクリックイベント
    const browseBtnClick = (): void => {
        refLogo.current.click();
    };

    return (
        <React.StrictMode>
            <div className="form-item">
                <div className="form-label__outer">
                    <label className="form-label" htmlFor={props.name}>{props.txt}</label>
                    { props.required === true ? <span className="form-required"></span> : null }
                </div>
                <div className="file-item">
                    <div className="form-file">
                        <div className="form-file__inner">
                            <button type="button" className="clear-btn" ref={clearBtn} onClick={e => clearBtnClick(e)}></button>
                            <span className="form-file__name">{fileName}</span>
                        </div>
                        <label className="form-file__label" htmlFor={props.name}>
                            <button type="button" className="browse-btn" onClick={() => browseBtnClick()}><i className="fas fa-folder"></i></button>
                            <input id={props.name} className="modal-form__input d-none" ref={refLogo} onChange={e => selectFile(e)} type='file' name={props.name} multiple/>
                        </label>
                    </div>
                    <div className="preview-outer">
                        <canvas ref={canvas} id="preview"></canvas>
                    </div>
                </div>
            </div>
        </React.StrictMode>
    )
};

export default InputFile;
