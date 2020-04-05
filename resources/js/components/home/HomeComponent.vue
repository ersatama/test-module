<template>
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="form-group">
                <select id="inputState" class="form-control" v-model="param">
                    <option v-for="(item, index) in type" :value="index">{{item}}</option>
                </select>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="form-group">
                <input type="text" class="form-control" v-model="search">
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="form-group mb-2">
                <a :href="'/search?type='+param+'&search='+search">
                    <button type="button" class="btn btn-block btn-primary mb-2">Поиск</button>
                </a>
            </div>

        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                type: ['Номер накладной','Номер заказа','ID'],
                param: 0,
                search: '',
            }
        }
    }
</script>
<style>
    a{text-decoration: none !important}
</style>
