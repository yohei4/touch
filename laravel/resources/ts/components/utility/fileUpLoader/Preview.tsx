import React, { useRef, useEffect } from 'react';
import Button from './Button';
import Converter from '../../Converter';

interface PreviewProps {
    photo: {key: number, original: File, base64: string};
    id: number;
    index: number;
    onClick(event: any, index: number): void;
}

const Preview = (props: PreviewProps) => {
    const PhotoItem = useRef(null);
    const imgRef = useRef<HTMLImageElement>(null);

    useEffect(() => {
        if(props.photo.original) previewImage(props.photo.original);
    }, [props.photo]);

    // 画像ファイルを表示
    const previewImage = (file: File): void => {
        Converter.toBase64(file).then(base64 => {
            props.photo.base64 = base64;
            imgRef.current.src = base64;
        });
    };

    return (
        <li className="photo-item" ref={PhotoItem}>
            <picture>
                <img className="photo-item__preview" ref= {imgRef} />
            </picture>
            <Button
                onClick={e => props.onClick(e, props.index)}
            />
        </li>
    )
};

export default Preview;
