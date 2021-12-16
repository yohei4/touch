interface TitleProps {
    txt: string;
}

const Title = (props: TitleProps) => {
    return (
        <h2 className="modal-form___title">{props.txt}</h2>
    )
};

export default Title;
