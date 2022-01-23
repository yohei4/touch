const MyFormData = class extends FormData {
    set data(props: any) {
        Object.keys(props).forEach(key => {
            this.data.append
        });
    }

    get data() {
        return this;
    }
}
