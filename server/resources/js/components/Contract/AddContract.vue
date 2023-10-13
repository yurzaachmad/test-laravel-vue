<script>
export default {
    data() {
        return {
            postData: {
                idContract: "",
                result: "",
                passed: true,
                nip: "",
                idStudy: "",
                nim: "",
                date: "",
            },
        };
    },
    methods: {
        submitStudy(event) {
            event.preventDefault();
            axios
                .post("/api/contracts", this.postData)
                .then((response) => {
                    console.log(response.data);
                })
                .catch((error) => {
                    console.log("Error", error);
                });
        },
    },
};
//
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
                    v-model="postData.idContract"
                />
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                    >Result</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="exampleInputPassword1"
                    v-model="postData.result"
                />
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                    >Passed</label
                >
                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="flexRadioDefault"
                        id="true"
                        value="true"
                        v-model="postData.passed"
                    />
                    <label class="form-check-label" for="flexRadioDefault1">
                        passed
                    </label>
                </div>
                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="flexRadioDefault"
                        id="false"
                        value="false"
                        v-model="postData.passed"
                    />
                    <label class="form-check-label" for="flexRadioDefault2">
                        repeat
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                    >NIP</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="exampleInputPassword1"
                    v-model="postData.nip"
                />
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                    >ID Study</label
                >
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
                    >NIM</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="exampleInputPassword1"
                    v-model="postData.nim"
                />
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Date</label>
                <input
                    type="date"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    v-model="postData.date"
                />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
