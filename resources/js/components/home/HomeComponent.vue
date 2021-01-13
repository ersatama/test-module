<template>
    <div class="row py-5 justify-content-center">
        <div class="col-6 align-self-center" v-if="user_id !== 0">
            <table class="table border-0 w-100">
                <tr>
                    <th>Добро пожаловать вы модуль!</th>
                    <td>
                        <a href="/logout">
                            <button class="btn btn-sm btn-danger w-100">Выйти</button>
                        </a>
                    </td>
                </tr>
            </table>
            <div class="card mb-3 bg-light" v-for="(item,id) in col">
                <h5 class="card-title font-weight-bold p-3 m-0">{{item.title}}</h5>
                <hr>
                <div class="row p-3" v-if="item.comments.length > 0">
                    <div class="col-6 text-white mx-3 mb-3 p-2 rounded" v-for="(comment,index) in item.comments" :class="{ 'bg-success ml-auto': (user_id === comment.user_id),'bg-primary': !(user_id === comment.user_id) }">
                        <div style="font-size: 10px;">{{comment.user.name}} <span class="text-dark">{{comment.user.email}}</span> <template v-if="comment.comment_id">ответил {{comment.comment_id.user.name}} <span class="text-dark">{{comment.comment_id.user.email}}</span></template></div>
                        <div style="font-size: 14px;" class="font-weight-bold">{{comment.comment}}</div>
                        <div v-if="comment.audio">
                            <audio :src="comment.audio" controls></audio>
                        </div>
                        <div style="font-size: 9px" class="text-light">{{comment.created_at}} <span class="text-grey answer" v-if="user_id !== comment.user_id" @click="answer(id,index)">Ответить</span></div>
                    </div>
                </div>
                <div v-else class="px-3 text-secondary" style="font-size: 12px">
                    Вы можете оставить первым комментарий
                </div>
                <hr>
                <div class="row pb-3">
                    <div class="col mx-3">
                        <label :for="'txt'+id">Ваш комментарий ({{item.title}})</label>
                        <div style="font-size: 11px;">
                            <div class="bg-primary text-white mb-3 p-2 px-3 w-auto" style="float: left; border-radius: 30px;" v-if="item.comment.to">Ответить {{item.comment.to.name}} <span class="text-dark">{{item.comment.to.email}}</span> <span class="font-weight-bold text-white" style="cursor: pointer;" @click="removeAnswer(id)">Удалить</span></div>
                        </div>
                        <textarea class="form-control w-100" style="resize: none; font-size: 12px;" rows="3" v-model="item.comment.text" :id="'txt'+item" :ref="'txt'+id"></textarea>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary pull-right mt-3 ml-3 mr-3" style="font-size: 12px" @click="comment(id)">Оставить комментарий</button>
                        <template v-if="type === 2">
                            <button class="btn btn-success mt-3" style="font-size: 12px" v-if="!item.audio.status" @click="record(id,true)">Запись</button>
                            <button class="btn btn-danger mt-3" style="font-size: 12px" v-else @click="record(id,false)">Отменить</button>
                            <div class="row" v-show="item.audio.status">
                                <div class="col">
                                    <audio-recorder :ref="'record-'+id" :dataId="id"
                                        :upload-url="item.comment.audio"
                                        :attempts="1"
                                        :time="10"
                                        :filename="audio"
                                        :headers="headers"
                                        :show-download-button="false"
                                        :successful-upload="upload"
                                        :before-recording="beforeRecording"
                                        :pause-recording="callback"
                                        :after-recording="afterRecording"
                                        :select-record="callback"
                                        :before-upload="beforeAudioUpload"
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
                to_comment: false,
                user_id: 0,
                type: 1,
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
            let self    =   this;
            axios({
                method: 'get',
                url: '/user/id',
                responseType: 'json',
            })
            .then ( function (response) {
                let data        =   response.data;
                self.user_id    =   data.id;
                self.type       =   data.type;
            });
        },
        mounted() {
            axios.get('/all').then(response => (this.col = response.data));
        },
        methods: {
            beforeRecording(data) {
            },
            afterRecording(data) {
            },
            success(data) {

            },
            beforeAudioUpload(data) {

            },
            removeAnswer(id) {
                let col                     =   this.col[id];
                this.col[id].comment.to     =   null;
                this.col[id].comment.to_id  =   null;
                col.comment.audio           =   '/audio/save/'+id+'/'+col.id;
            },
            answer(id,index) {
                let col             =   this.col[id];
                col.comment.to      =   col.comments[index].user;
                col.comment.to_id   =   index;
                col.comment.audio   =   '/audio/save/'+id+'/'+col.id+'/'+index;
            },
            comment(id) {
                let txt     =   this.col[id].comment.text.trim();
                if (txt === '') {
                    return this.$refs['txt'+id][0].focus();
                }
                let data    =   {
                    id: this.col[id].id,
                    comment: txt,
                    to: null
                };
                if (this.col[id].comment.to) {
                    data.to =   this.col[id].comment.to_id;
                }
                this.removeAnswer(id);
                this.col[id].comment.text   =   '';
                axios.post('/module/comment/',data).then(response => this.col[id].comments = response.data);
            },
            upload (data) {
                let response    =   data.data;
                this.removeAnswer(response.id);
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
    .answer {
        float: right;
        cursor: pointer;
    }
    .answer:hover {
        text-decoration: underline;
    }
</style>
