<template>
    <div class="card">
        <div class="card-header">
            Widget Calculator
        </div>
        <div class="card-body">

            <!-- has errors show in vue -->

            <div class="form-group">
                <label for="widget_total">
                    Number of Widgets ordered:
                </label>
                <input type="text" v-model="required_widgets" class="form-control" name="required_widgets" required placeholder="eg. 12345" />
            </div>

            <div v-html="output"></div>

        </div>
        <div class="card-footer">
            <button class="btn btn-calculate-widget btn-success" @click="calculateWidgets">Calculate</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                required_widgets: '',
                output: ''
            }
            
        },

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            calculateWidgets(e) {
                e.preventDefault();
                let self = this;
                axios.post('/', {
                    required_widgets: this.required_widgets
                })
                .then(function (response) {
                    self.output = response.data;
                })
                .catch(function (error) {
                    console.log('error', error)
                });
            }
        }
    }
</script>
