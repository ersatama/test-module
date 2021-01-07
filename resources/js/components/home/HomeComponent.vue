<template>
    <div class="row py-5 justify-content-center">
        <div class="col-6 align-self-center" v-if="user_id !== 0">
            <div class="card mb-3 bg-light" v-for="(item,id) in col">
                <h5 class="card-title font-weight-bold p-3 m-0">{{item.title}}</h5>
                <hr>
                <div class="row p-3" v-if="item.comments.length > 0">
                    <div class="col-6 text-white mx-3 mb-3 p-2 rounded" v-for="comment in item.comments" :class="{ 'bg-success ml-auto': (user_id === comment.user_id),'bg-primary': !(user_id === comment.user_id) }">
                        <div style="font-size: 10px;">{{comment.user.name}} <span class="text-dark text-right">{{comment.user.email}}</span></div>
                        <div style="font-size: 14px;" class="font-weight-bold">{{comment.comment}}</div>
                        <div v-if="comment.audio">
                            <audio :src="comment.audio" controls></audio>
                        </div>
                    </div>
                </div>
                <div v-else class="px-3 text-secondary" style="font-size: 12px">
                    Вы можете оставить первым комментарий
                </div>
                <hr>
                <div class="row pb-3">
                    <div class="col mx-3">
                        <label :for="'txt'+id">Ваш комментарий ({{item.title}})</label>
                        <textarea class="form-control w-100" style="resize: none; font-size: 12px;" rows="3" v-model="item.comment.text" :id="'txt'+item" :ref="'txt'+id"></textarea>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary pull-right mt-3 ml-3 mr-3" style="font-size: 12px" @click="comment(id)">Оставить комментарий</button>
                        <template v-if="type === 'admin'">
                            <button class="btn btn-success mt-3" style="font-size: 12px" v-if="!item.audio.status" @click="record(id,true)">Запись</button>
                            <button class="btn btn-danger mt-3" style="font-size: 12px" v-else @click="record(id,false)">Отменить</button>
                            <div class="row" v-show="item.audio.status">
                                <div class="col">
                                    <audio-recorder
                                        :upload-url="'/audio/save/'+id+'/'+item.id"
                                        :attempts="1"
                                        :time="10"
                                        :filename="audio"
                                        :headers="headers"
                                        :show-download-button="false"
                                        :successful-upload="upload"
                                        :before-recording="callback"
                                        :pause-recording="callback"
                                        :after-recording="callback"
                                        :select-record="callback"
                                        :before-upload="callback"
                                        :failed-upload="callback"/>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="color-dark h2">
            Загрузка коммента...
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                user_id: 0,
                type: 'admin',
                status: true,
                audio: 'audio',
                headers: {
                    post: '/audio/save',
                    type: 'POST',
                    cache: false,
                    contentType: false,
                },
                rec: '',
                col: []
            }
        },
        created() {
            axios.get('/user/id').then(response => (this.user_id = response.data));
        },
        mounted() {
            axios.get('/all').then(response => (this.col = response.data));
        },
        methods: {
            comment(id) {
                let txt =   this.col[id].comment.text.trim();
                if (txt === '') {
                    return this.$refs['txt'+id][0].focus();
                }
                let data    =   {
                    id: this.col[id].id,
                    comment: txt,
                };
                axios.post('/module/comment/',data).then(response => this.col[id].comments = response.data);
            },
            upload (data) {
                let response    =   data.data;
                this.col[response.id].comments  =   response.comments;
            },
            callback (data) {
                console.debug(data)
            },
            record(id, status) {
                if (status) {
                    if (this.status) {
                        this.status =   false;
                        this.col[id].audio.status   =   status;
                    } else {
                        alert('Вы уже записываете голосовое сообщение');
                    }
                } else {
                    this.status =   true;
                    this.col[id].audio.status   =   status;
                }
            },
        }
    }
</script>
<style scoped>
    .ar {
        width: auto;
        box-shadow: none;
        border-radius: 0;
        background: #f8f9fa;
        margin: 15px;
    }
    svg {
        vertical-align: baseline !important;
    }
    audio {
        width: 100%;
        height: 30px;
        margin: 10px 0 0 0;
    }
</style>
