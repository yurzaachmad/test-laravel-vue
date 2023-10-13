<script>
export default {
    data() {
        return {
            postData: {
                idStudy: "",
                nameStudy: "",
                sks: "",
            },
        };
    },
    methods: {
        submitStudy(event) {
            event.preventDefault();
            axios
                .post("/api/studies", this.postData)
                .then((response) => {
                    console.log(response.data);
                })
                .catch((error) => {
                    console.log("Error", error);
                });
        },
    },
};
</script>

<template>
    <div class="input-group mb-8" id="search">
        <form @submit="submitStudy">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ID</label>
                <input
                    type="text"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    v-model="postData.idStudy"
                />
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                    >Name</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="exampleInputPassword1"
                    v-model="postData.nameStudy"
                />
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                    >SKS</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="exampleInputPassword1"
                    v-model="postData.sks"
                />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
