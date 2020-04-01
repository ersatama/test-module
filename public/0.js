(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/orders/OrdersComponent.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/orders/OrdersComponent.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      currentDate: this.currentDate(),
      status: false,
      order: 0,
      cities: [],
      countries: [],
      template: '',
      save: true,
      senderTemplate: {
        name: '',
        iin: '',
        country: '',
        region: '',
        city: '',
        index: '',
        street: '',
        house: '',
        office: '',
        person: {
          name: '',
          phone: '',
          take_date: '',
          take_time: ''
        }
      },
      sender: {},
      templateList: [],
      receiverTemplate: {
        template: '',
        placeholder: '',
        data: '',
        name: '',
        saveTemplate: false,
        type: 1,
        status: true,
        iin: '',
        code: '',
        countries: [],
        country: 1,
        region: '',
        cities: [],
        city: '',
        index: '',
        house: '',
        street: '',
        office: '',
        contactPerson: {
          name: '',
          phone: ''
        },
        info: {
          place: '',
          weight: '',
          volume: '',
          annotation: ''
        },
        payment: {
          personType: 0,
          typeList: ['Перечислением на счет', 'Банковской картой', 'Наличными'],
          type: 0
        },
        deliver: {
          type: 0,
          payment: '',
          price: ''
        }
      },
      receiver: [],
      model: ''
    };
  },
  mounted: function mounted() {
    console.log('hello mounted');
    this.changeCity();
    this.getTemplateList();
    this.getCountries();
    this.receiverCity(1);
  },
  created: function created() {
    this.setValues();
    this.setSender();
  },
  methods: {
    receiverTypeChange: function receiverTypeChange(id) {
      if (this.receiver[id].type == 0) {
        this.receiver[id].status = false;
      } else {
        this.receiver[id].status = true;
      }
    },
    readyOrder: function readyOrder() {
      if (this.sender.region.trim() === '') {
        return $("#sender_region").focus();
      } else if (this.sender.street.trim() === '') {
        return $("#sender_street").focus();
      } else if (this.sender.house.trim() === '') {
        return $("#sender_house").focus();
      } else if (this.sender.person.name.trim() === '') {
        return $("#sender_person_name").focus();
      } else if (this.sender.person.phone.trim() === '') {
        return $("#sender_person_phone").focus();
      } else if (this.sender.person.take_date.trim() === '') {
        return $("#sender_person_take_date").focus();
      } else if (this.sender.person.take_time.trim() === '') {
        return $("#sender_person_take_time").focus();
      }

      if (this.receiver.length === 0) {
        return Vue.$toast.open({
          message: 'Пожалуйста укажите получателя!',
          type: 'warning',
          position: 'top-left',
          duration: 5000
        });
      } else {
        this.receiver.forEach(function callback(value, index) {
          if (value.name.trim() === '') {
            return $("#name-" + index).focus();
          } else if (value.iin.trim() === '') {
            return $("#iin-" + index).focus();
          } else if (value.region.trim() === '') {
            return $("#region-" + index).focus();
          } else if (value.street.trim() === '') {
            return $("#street-" + index).focus();
          } else if (value.contactPerson.name.trim() === '') {
            return $("#contact-person-name-" + index).focus();
          } else if (value.contactPerson.phone.trim() === '') {
            return $("#contact-person-phone-" + index).focus();
          } else if (value.info.place.trim() === '') {
            return $("#contact-info-place-" + index).focus();
          } else if (value.info.weight.trim() === '') {
            return $("#contact-info-weight-" + index).focus();
          } else if (value.info.volume.trim() === '') {
            return $("#contact-info-volume-" + index).focus();
          }

          if (value.template.trim() === '') {
            value.template = $("#template-" + index).data('value');
          }
        });
      }

      if (!this.template.trim()) {
        this.template = $("#template").data('value');
      }

      axios.post('/order/save', {
        template: {
          name: this.template,
          save: this.save
        },
        sender: this.sender,
        receiver: this.receiver
      }).then(function (response) {
        app.order = response.data;
        app.status = true;
      })["catch"](function (error) {
        console.log(error);
      });
    },
    setValues: function setValues() {
      this.senderTemplate.country = $("#sender_country").children("option:selected").val();
      this.senderTemplate.name = $("#sender_name").val().trim();
      this.senderTemplate.iin = $("#sender_iin").val().trim();
    },
    currentDate: function currentDate() {
      var day = date.getDate();
      day = day < 10 ? '0' + day : day;
      var month = date.getMonth() + 1;
      month = month < 10 ? '0' + month : month;
      var hours = date.getHours();
      hours = hours < 10 ? '0' + hours : hours;
      var minutes = date.getMinutes();
      minutes = minutes < 10 ? '0' + minutes : minutes;
      var seconds = date.getSeconds();
      seconds = seconds < 10 ? '0' + seconds : seconds;
      return day + '-' + month + '-' + date.getFullYear() + '_' + hours + ':' + minutes + ':' + seconds;
    },
    getDateTemplate: function getDateTemplate(id) {
      var currentDate = this.currentDate();
      var date = new Date();
      return this.senderTemplate.iin + '_' + id + '_' + currentDate;
    },
    setSender: function setSender() {
      this.sender = Object.assign({}, this.senderTemplate);
      this.receiver = [];
      this.changeCity();
      var dateTemp = this.getDateTemplate(0);
      $("#template").attr('placeholder', dateTemp).data('data-value', dateTemp);
    },
    refreshOrder: function refreshOrder() {
      this.template = '';
      this.save = true;
      this.status = false;
      this.getTemplateList();
      this.setSender();
    },
    receiverCity: function receiverCity(id) {
      var _this = this;

      axios.get('order/city_list/' + id).then(function (response) {
        return _this.receiverTemplate.cities = response.data, _this.receiverTemplate.city = _this.receiverTemplate.cities[0].id;
      }); //this.receiverTemplate.city = this.receiverTemplate.cities[0].id;
    },
    changeCityReceiver: function changeCityReceiver(id) {
      var _this2 = this;

      axios.get('order/city_list/' + this.receiver[id].country).then(function (response) {
        return _this2.receiver[id].cities = response.data, _this2.receiver[id].city = _this2.receiver[id].cities[0].id;
      });
    },
    show: function show(a) {
      console.log(a);
    },
    newReceiver: function newReceiver() {
      this.receiver.push(Object.assign({}, this.receiverTemplate));
      var id = this.receiver.length - 1;
      var dateTemp = this.getDateTemplate(this.receiver.length);
      this.receiver[id].cities = this.receiverTemplate.cities;
      this.receiver[id].placeholder = dateTemp;
      this.receiver[id].data = dateTemp;
    },
    changeReceiverTemplate: function changeReceiverTemplate(id) {
      axios.get('order/template_receiver/' + this.receiver[id].template).then(function (response) {
        var data = JSON.parse(response.data[0].data);
        var receiver = app.receiver[id];
        receiver.name = data.name;
        receiver.placeholder = data.placeholder;
        receiver.data = data.data;
        receiver.saveTemplate = data.saveTemplate;
        receiver.type = data.type;
        receiver.status = data.status;
        receiver.iin = data.iin;
        receiver.code = data.code;
        receiver.countries = data.countries;
        receiver.country = data.country;
        receiver.region = data.region;
        receiver.cities = data.cities;
        receiver.city = data.city;
        receiver.index = data.index;
        receiver.house = data.house;
        receiver.street = data.street;
        receiver.office = data.office;
        receiver.contactPerson.name = data.contactPerson.name;
        receiver.contactPerson.phone = data.contactPerson.phone;
        receiver.info.place = data.info.place;
        receiver.info.weight = data.info.weight;
        receiver.info.volume = data.info.volume;
        receiver.info.annotation = data.info.annotation;
        receiver.payment.personType = data.payment.personType;
        receiver.payment.typeList = data.payment.typeList;
        receiver.payment.type = data.payment.type;
        receiver.deliver.type = data.deliver.type;
        receiver.deliver.payment = data.deliver.payment;
        receiver.deliver.price = data.deliver.price;
      });
    },
    getCountries: function getCountries() {
      var _this3 = this;

      axios.get('order/countries').then(function (response) {
        return _this3.countries = response.data, _this3.receiverTemplate.countries = response.data;
      });
    },
    getTemplateList: function getTemplateList() {
      var _this4 = this;

      axios.get('order/template_list').then(function (response) {
        return _this4.templateList = response.data;
      });
    },
    removeReceiver: function removeReceiver(id) {
      this.receiver.splice(id, 1);
    },
    viewReceiver: function viewReceiver(id) {
      $("#form-receiver-" + id).find('.receiver-hide').toggleClass('reverse').end().find('.view-block').fadeToggle(0);
    },
    changeCity: function changeCity() {
      var _this5 = this;

      axios.get('order/city_list/' + this.sender.country).then(function (response) {
        return _this5.cities = response.data, _this5.sender.city = response.data[0].id;
      });
    },
    changeTemplate: function changeTemplate() {
      axios.get('order/template/' + this.template).then(function (response) {
        app.sender = JSON.parse(response.data[0].data);
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/orders/OrdersComponent.vue?vue&type=template&id=7ce16d59&":
/*!*************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/orders/OrdersComponent.vue?vue&type=template&id=7ce16d59& ***!
  \*************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.status
    ? _c("div", [
        _c("div", { staticClass: "container mb-5" }, [
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col-12" }, [
              _c(
                "div",
                {
                  staticClass: "p-3 mt-3 mb-2 bg-success text-white text-center"
                },
                [
                  _vm._v(
                    "Ваш заказ успешно принят в обработку, с вами скоро свяжутся!"
                  ),
                  _c("br"),
                  _vm._v("номер вашего заказа "),
                  _c("span", { staticClass: "text-dark font-weight-bold" }, [
                    _vm._v("№" + _vm._s(_vm.order))
                  ])
                ]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col text-center mt-3" }, [
              _c(
                "button",
                {
                  staticClass: "btn btn-primary px-5",
                  attrs: { type: "button" },
                  on: {
                    click: function($event) {
                      return _vm.refreshOrder()
                    }
                  }
                },
                [_vm._v("Добавить новый заказ")]
              )
            ])
          ])
        ])
      ])
    : _c("div", [
        _c("div", { staticClass: "container mb-5" }, [
          _c("h5", [_vm._v("Добавить заказ")]),
          _vm._v(" "),
          _c("h5", { staticClass: "text-success" }, [_vm._v("Отправитель")]),
          _vm._v(" "),
          _c(
            "form",
            {
              attrs: {
                method: "POST",
                action: "/profile",
                onsubmit: "return false;"
              }
            },
            [
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-12 col-sm-6 col-md-6" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Шаблон")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.template,
                          expression: "template"
                        }
                      ],
                      staticClass: "form-control bg-light",
                      attrs: {
                        list: "templates",
                        id: "template",
                        "data-value": _vm.sender.iin + "_0_" + _vm.currentDate,
                        placeholder: _vm.sender.iin + "_0_" + _vm.currentDate
                      },
                      domProps: { value: _vm.template },
                      on: {
                        change: _vm.changeTemplate,
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.template = $event.target.value
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c(
                      "datalist",
                      { attrs: { id: "templates" } },
                      _vm._l(_vm.countries, function(country) {
                        return _c(
                          "option",
                          { domProps: { value: country["name"] } },
                          [_vm._v(_vm._s(country["name"]))]
                        )
                      }),
                      0
                    )
                  ]),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "custom-control custom-checkbox mb-3" },
                    [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.save,
                            expression: "save"
                          }
                        ],
                        staticClass: "custom-control-input",
                        attrs: { type: "checkbox" },
                        domProps: {
                          checked: Array.isArray(_vm.save)
                            ? _vm._i(_vm.save, null) > -1
                            : _vm.save
                        },
                        on: {
                          change: function($event) {
                            var $$a = _vm.save,
                              $$el = $event.target,
                              $$c = $$el.checked ? true : false
                            if (Array.isArray($$a)) {
                              var $$v = null,
                                $$i = _vm._i($$a, $$v)
                              if ($$el.checked) {
                                $$i < 0 && (_vm.save = $$a.concat([$$v]))
                              } else {
                                $$i > -1 &&
                                  (_vm.save = $$a
                                    .slice(0, $$i)
                                    .concat($$a.slice($$i + 1)))
                              }
                            } else {
                              _vm.save = $$c
                            }
                          }
                        }
                      }),
                      _vm._v(" "),
                      _c("label", { staticClass: "custom-control-label" }, [
                        _vm._v("Сохранить шаблон")
                      ])
                    ]
                  )
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-12 col-sm-6 col-md-3" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Наименование")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.sender.name,
                          expression: "sender.name"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        type: "text",
                        autocomplete: "none",
                        readonly: "true",
                        id: "sender_name"
                      },
                      domProps: { value: _vm.sender.name },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.sender, "name", $event.target.value)
                        }
                      }
                    })
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-12 col-sm-6 col-md-3" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("БИН")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.sender.iin,
                          expression: "sender.iin"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        type: "text",
                        autocomplete: "none",
                        readonly: "true",
                        id: "sender_iin"
                      },
                      domProps: { value: _vm.sender.iin },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.sender, "iin", $event.target.value)
                        }
                      }
                    })
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-12 col-sm-6 col-md-3" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Страна")]),
                    _vm._v(" "),
                    _c(
                      "select",
                      {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.sender.country,
                            expression: "sender.country"
                          }
                        ],
                        staticClass: "form-control text-capitalize bg-light",
                        attrs: { id: "sender_country" },
                        on: {
                          change: [
                            function($event) {
                              var $$selectedVal = Array.prototype.filter
                                .call($event.target.options, function(o) {
                                  return o.selected
                                })
                                .map(function(o) {
                                  var val = "_value" in o ? o._value : o.value
                                  return val
                                })
                              _vm.$set(
                                _vm.sender,
                                "country",
                                $event.target.multiple
                                  ? $$selectedVal
                                  : $$selectedVal[0]
                              )
                            },
                            _vm.changeCity
                          ]
                        }
                      },
                      _vm._l(_vm.templateList, function(template) {
                        return _c("option", {
                          domProps: { value: template.id }
                        })
                      }),
                      0
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-12 col-sm-6 col-md-3" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Область")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.sender.region,
                          expression: "sender.region"
                        }
                      ],
                      staticClass: "form-control bg-light",
                      attrs: { type: "text", id: "sender_region" },
                      domProps: { value: _vm.sender.region },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.sender, "region", $event.target.value)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("small", { staticClass: "form-text text-success" }, [
                      _vm._v("Обязательное поле.")
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-12 col-sm-6 col-md-3" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Город")]),
                    _vm._v(" "),
                    _c(
                      "select",
                      {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.sender.city,
                            expression: "sender.city"
                          }
                        ],
                        staticClass: "form-control text-capitalize bg-light",
                        attrs: { id: "sender_city" },
                        on: {
                          change: function($event) {
                            var $$selectedVal = Array.prototype.filter
                              .call($event.target.options, function(o) {
                                return o.selected
                              })
                              .map(function(o) {
                                var val = "_value" in o ? o._value : o.value
                                return val
                              })
                            _vm.$set(
                              _vm.sender,
                              "city",
                              $event.target.multiple
                                ? $$selectedVal
                                : $$selectedVal[0]
                            )
                          }
                        }
                      },
                      _vm._l(_vm.cities, function(city) {
                        return _c("option", { domProps: { value: city.id } })
                      }),
                      0
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-12 col-sm-6 col-md-3" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Индекс")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.sender.index,
                          expression: "sender.index"
                        }
                      ],
                      staticClass: "form-control bg-light",
                      attrs: { type: "text" },
                      domProps: { value: _vm.sender.index },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.sender, "index", $event.target.value)
                        }
                      }
                    })
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-12 col-sm-6 col-md-3" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Улица")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.sender.street,
                          expression: "sender.street"
                        }
                      ],
                      staticClass: "form-control bg-light",
                      attrs: { type: "text", id: "sender_street" },
                      domProps: { value: _vm.sender.street },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.sender, "street", $event.target.value)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("small", { staticClass: "form-text text-success" }, [
                      _vm._v("Обязательное поле.")
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-12 col-sm-6 col-md-3" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Дом")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.sender.house,
                          expression: "sender.house"
                        }
                      ],
                      staticClass: "form-control bg-light",
                      attrs: { type: "text", id: "sender_house" },
                      domProps: { value: _vm.sender.house },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.sender, "house", $event.target.value)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("small", { staticClass: "form-text text-success" }, [
                      _vm._v("Обязательное поле.")
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-12 col-sm-6 col-md-3" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Офис")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.sender.office,
                          expression: "sender.office"
                        }
                      ],
                      staticClass: "form-control bg-light",
                      attrs: { type: "text" },
                      domProps: { value: _vm.sender.office },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.sender, "office", $event.target.value)
                        }
                      }
                    })
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-12 col-sm-6 col-md-3" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Контактное лицо")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.sender.person.name,
                          expression: "sender.person.name"
                        }
                      ],
                      staticClass: "form-control bg-light",
                      attrs: { type: "text", id: "sender_person_name" },
                      domProps: { value: _vm.sender.person.name },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.sender.person,
                            "name",
                            $event.target.value
                          )
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("small", { staticClass: "form-text text-success" }, [
                      _vm._v("Обязательное поле.")
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-12 col-sm-6 col-md-3" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Телефон")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.sender.person.phone,
                          expression: "sender.person.phone"
                        }
                      ],
                      staticClass: "form-control bg-light",
                      attrs: { type: "text", id: "sender_person_phone" },
                      domProps: { value: _vm.sender.person.phone },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.sender.person,
                            "phone",
                            $event.target.value
                          )
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("small", { staticClass: "form-text text-success" }, [
                      _vm._v("Обязательное поле.")
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-12 col-sm-6 col-md-3" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Дата забора")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.sender.person.take_date,
                          expression: "sender.person.take_date"
                        }
                      ],
                      staticClass: "form-control bg-light",
                      attrs: { type: "date", id: "sender_person_take_date" },
                      domProps: { value: _vm.sender.person.take_date },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.sender.person,
                            "take_date",
                            $event.target.value
                          )
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("small", { staticClass: "form-text text-success" }, [
                      _vm._v("Обязательное поле.")
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-12 col-sm-6 col-md-3" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Время забора")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.sender.person.take_time,
                          expression: "sender.person.take_time"
                        }
                      ],
                      staticClass: "form-control bg-light",
                      attrs: { type: "text", id: "sender_person_take_time" },
                      domProps: { value: _vm.sender.person.take_time },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.sender.person,
                            "take_time",
                            $event.target.value
                          )
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("small", { staticClass: "form-text text-success" }, [
                      _vm._v("Обязательное поле.")
                    ])
                  ])
                ])
              ]),
              _vm._v(" "),
              _c(
                "div",
                { attrs: { id: "receiver-list" } },
                _vm._l(_vm.receiver, function(item, index) {
                  return _c(
                    "div",
                    {
                      class: [
                        _vm.receiver ? "form-receiver mb-3 w-100" : "d-none",
                        ""
                      ],
                      attrs: { id: "form-receiver-" + index }
                    },
                    [
                      _c(
                        "button",
                        {
                          staticClass:
                            "btn btn-danger float-right btn-sm receiver-delete",
                          on: {
                            click: function($event) {
                              return _vm.removeReceiver(index)
                            }
                          }
                        },
                        [
                          _c("i", {
                            staticClass: "fas fa-trash",
                            attrs: { "aria-hidden": "true" }
                          })
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "button",
                        {
                          staticClass:
                            "btn btn-success float-right btn-sm mr-3 receiver-hide",
                          on: {
                            click: function($event) {
                              return _vm.viewReceiver(index)
                            }
                          }
                        },
                        [
                          _c("i", {
                            staticClass: "fas fa-chevron-down",
                            attrs: { "aria-hidden": "true" }
                          })
                        ]
                      ),
                      _vm._v(" "),
                      _c("h5", { staticClass: "text-success mt-1" }, [
                        _vm._v("Получатель @" + _vm._s(index + 1))
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "view-block" }, [
                        _c(
                          "div",
                          {
                            staticClass: "row",
                            attrs: { id: "receiver-0-body" }
                          },
                          [
                            _c("div", { staticClass: "col-12 col-sm-6" }, [
                              _c("div", { staticClass: "form-group" }, [
                                _c("label", [_vm._v("Шаблон")]),
                                _vm._v(" "),
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.receiver[index].template,
                                      expression: "receiver[index].template"
                                    }
                                  ],
                                  staticClass: "form-control",
                                  attrs: {
                                    list: "select_1",
                                    value: "",
                                    id: "template-" + index,
                                    placeholder:
                                      _vm.receiver[index].placeholder,
                                    "data-value": _vm.receiver[index].data
                                  },
                                  domProps: {
                                    value: _vm.receiver[index].template
                                  },
                                  on: {
                                    change: function($event) {
                                      return _vm.changeReceiverTemplate(index)
                                    },
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.receiver[index],
                                        "template",
                                        $event.target.value
                                      )
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _c(
                                  "datalist",
                                  { attrs: { id: "select_1" } },
                                  _vm._l(_vm.templateList, function(temp) {
                                    return _c(
                                      "option",
                                      { domProps: { value: temp.name } },
                                      [_vm._v("@" + _vm._s(temp.name))]
                                    )
                                  }),
                                  0
                                ),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "custom-control custom-checkbox"
                                  },
                                  [
                                    _c("input", {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value:
                                            _vm.receiver[index].saveTemplate,
                                          expression:
                                            "receiver[index].saveTemplate"
                                        }
                                      ],
                                      staticClass: "custom-control-input",
                                      attrs: {
                                        type: "checkbox",
                                        id: "customCheck",
                                        name: "example1",
                                        checked: ""
                                      },
                                      domProps: {
                                        checked: Array.isArray(
                                          _vm.receiver[index].saveTemplate
                                        )
                                          ? _vm._i(
                                              _vm.receiver[index].saveTemplate,
                                              null
                                            ) > -1
                                          : _vm.receiver[index].saveTemplate
                                      },
                                      on: {
                                        change: function($event) {
                                          var $$a =
                                              _vm.receiver[index].saveTemplate,
                                            $$el = $event.target,
                                            $$c = $$el.checked ? true : false
                                          if (Array.isArray($$a)) {
                                            var $$v = null,
                                              $$i = _vm._i($$a, $$v)
                                            if ($$el.checked) {
                                              $$i < 0 &&
                                                _vm.$set(
                                                  _vm.receiver[index],
                                                  "saveTemplate",
                                                  $$a.concat([$$v])
                                                )
                                            } else {
                                              $$i > -1 &&
                                                _vm.$set(
                                                  _vm.receiver[index],
                                                  "saveTemplate",
                                                  $$a
                                                    .slice(0, $$i)
                                                    .concat($$a.slice($$i + 1))
                                                )
                                            }
                                          } else {
                                            _vm.$set(
                                              _vm.receiver[index],
                                              "saveTemplate",
                                              $$c
                                            )
                                          }
                                        }
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c(
                                      "label",
                                      {
                                        staticClass: "custom-control-label",
                                        attrs: { for: "customCheck" }
                                      },
                                      [_vm._v("Сохранить шаблон")]
                                    )
                                  ]
                                )
                              ])
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "col-12 col-sm-6" }, [
                              _c("div", { staticClass: "form-group mt-4" }, [
                                _c("div", { staticClass: "form-check" }, [
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.receiver[index].type,
                                        expression: "receiver[index].type"
                                      }
                                    ],
                                    staticClass: "form-check-input",
                                    attrs: {
                                      type: "radio",
                                      id: "receiver-type-0-" + index,
                                      value: "0"
                                    },
                                    domProps: {
                                      checked: _vm._q(
                                        _vm.receiver[index].type,
                                        "0"
                                      )
                                    },
                                    on: {
                                      change: [
                                        function($event) {
                                          return _vm.$set(
                                            _vm.receiver[index],
                                            "type",
                                            "0"
                                          )
                                        },
                                        function($event) {
                                          return _vm.receiverTypeChange(index)
                                        }
                                      ]
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c(
                                    "label",
                                    {
                                      staticClass: "form-check-label",
                                      attrs: { for: "receiver-type-0-" + index }
                                    },
                                    [
                                      _vm._v(
                                        "\n                                            Физическое лицо\n                                        "
                                      )
                                    ]
                                  )
                                ]),
                                _vm._v(" "),
                                _c("div", { staticClass: "form-check" }, [
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.receiver[index].type,
                                        expression: "receiver[index].type"
                                      }
                                    ],
                                    staticClass: "form-check-input",
                                    attrs: {
                                      type: "radio",
                                      id: "receiver-type-1-" + index,
                                      value: "1",
                                      checked: ""
                                    },
                                    domProps: {
                                      checked: _vm._q(
                                        _vm.receiver[index].type,
                                        "1"
                                      )
                                    },
                                    on: {
                                      change: [
                                        function($event) {
                                          return _vm.$set(
                                            _vm.receiver[index],
                                            "type",
                                            "1"
                                          )
                                        },
                                        function($event) {
                                          return _vm.receiverTypeChange(index)
                                        }
                                      ]
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c(
                                    "label",
                                    {
                                      staticClass: "form-check-label",
                                      attrs: { for: "receiver-type-1-" + index }
                                    },
                                    [
                                      _vm._v(
                                        "\n                                            Юридическое лицо\n                                        "
                                      )
                                    ]
                                  )
                                ])
                              ])
                            ]),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "col-12 col-sm-6 col-md-3" },
                              [
                                _c("div", { staticClass: "form-group" }, [
                                  _c(
                                    "label",
                                    { staticClass: "text-secondary" },
                                    [_vm._v("Наименование")]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.receiver[index].name,
                                        expression: "receiver[index].name"
                                      }
                                    ],
                                    staticClass: "form-control",
                                    attrs: {
                                      type: "text",
                                      id: "name-" + index
                                    },
                                    domProps: {
                                      value: _vm.receiver[index].name
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.receiver[index],
                                          "name",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c(
                                    "small",
                                    { staticClass: "form-text text-success" },
                                    [_vm._v("Обязательное поле.")]
                                  )
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "col-12 col-sm-6 col-md-3" },
                              [
                                _c("div", { staticClass: "form-group" }, [
                                  _c(
                                    "label",
                                    { staticClass: "text-secondary" },
                                    [_vm._v("БИН")]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.receiver[index].iin,
                                        expression: "receiver[index].iin"
                                      }
                                    ],
                                    staticClass: "form-control",
                                    attrs: {
                                      type: "text",
                                      id: "iin-" + index,
                                      readonly: !_vm.receiver[index].status
                                    },
                                    domProps: {
                                      value: _vm.receiver[index].iin
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.receiver[index],
                                          "iin",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c(
                                    "small",
                                    {
                                      staticClass: "form-text text-success",
                                      attrs: { id: "region" }
                                    },
                                    [_vm._v("Обязательное поле.")]
                                  )
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "col-12 col-sm-6 col-md-3" },
                              [
                                _c("div", { staticClass: "form-group" }, [
                                  _c(
                                    "label",
                                    { staticClass: "text-secondary" },
                                    [_vm._v("Код заказчика")]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.receiver[index].code,
                                        expression: "receiver[index].code"
                                      }
                                    ],
                                    staticClass: "form-control",
                                    attrs: { type: "text" },
                                    domProps: {
                                      value: _vm.receiver[index].code
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.receiver[index],
                                          "code",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  })
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "col-12 col-sm-6 col-md-3" },
                              [
                                _c("div", { staticClass: "form-group" }, [
                                  _c(
                                    "label",
                                    { staticClass: "text-secondary" },
                                    [_vm._v("Страна")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "select",
                                    {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value: _vm.receiver[index].country,
                                          expression: "receiver[index].country"
                                        }
                                      ],
                                      staticClass:
                                        "form-control text-capitalize",
                                      on: {
                                        change: [
                                          function($event) {
                                            var $$selectedVal = Array.prototype.filter
                                              .call(
                                                $event.target.options,
                                                function(o) {
                                                  return o.selected
                                                }
                                              )
                                              .map(function(o) {
                                                var val =
                                                  "_value" in o
                                                    ? o._value
                                                    : o.value
                                                return val
                                              })
                                            _vm.$set(
                                              _vm.receiver[index],
                                              "country",
                                              $event.target.multiple
                                                ? $$selectedVal
                                                : $$selectedVal[0]
                                            )
                                          },
                                          function($event) {
                                            return _vm.changeCityReceiver(index)
                                          }
                                        ]
                                      }
                                    },
                                    _vm._l(
                                      _vm.receiver[index].countries,
                                      function(country, index) {
                                        return _c(
                                          "option",
                                          { domProps: { value: country.id } },
                                          [_vm._v(_vm._s(country.russian_name))]
                                        )
                                      }
                                    ),
                                    0
                                  )
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "col-12 col-sm-6 col-md-3" },
                              [
                                _c("div", { staticClass: "form-group" }, [
                                  _c(
                                    "label",
                                    { staticClass: "text-secondary" },
                                    [_vm._v("Область")]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.receiver[index].region,
                                        expression: "receiver[index].region"
                                      }
                                    ],
                                    staticClass: "form-control",
                                    attrs: {
                                      type: "text",
                                      id: "region-" + index
                                    },
                                    domProps: {
                                      value: _vm.receiver[index].region
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.receiver[index],
                                          "region",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c(
                                    "small",
                                    { staticClass: "form-text text-success" },
                                    [_vm._v("Обязательное поле.")]
                                  )
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "col-12 col-sm-6 col-md-3" },
                              [
                                _c("div", { staticClass: "form-group" }, [
                                  _c(
                                    "label",
                                    { staticClass: "text-secondary" },
                                    [_vm._v("Город")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "select",
                                    {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value: _vm.receiver[index].city,
                                          expression: "receiver[index].city"
                                        }
                                      ],
                                      staticClass:
                                        "form-control text-capitalize",
                                      on: {
                                        change: [
                                          function($event) {
                                            var $$selectedVal = Array.prototype.filter
                                              .call(
                                                $event.target.options,
                                                function(o) {
                                                  return o.selected
                                                }
                                              )
                                              .map(function(o) {
                                                var val =
                                                  "_value" in o
                                                    ? o._value
                                                    : o.value
                                                return val
                                              })
                                            _vm.$set(
                                              _vm.receiver[index],
                                              "city",
                                              $event.target.multiple
                                                ? $$selectedVal
                                                : $$selectedVal[0]
                                            )
                                          },
                                          function($event) {
                                            return _vm.changeCityReceiver(index)
                                          }
                                        ]
                                      }
                                    },
                                    _vm._l(_vm.receiver[index].cities, function(
                                      receiverCity
                                    ) {
                                      return _c(
                                        "option",
                                        {
                                          domProps: { value: receiverCity.id }
                                        },
                                        [
                                          _vm._v(
                                            "@" +
                                              _vm._s(receiverCity.russian_name)
                                          )
                                        ]
                                      )
                                    }),
                                    0
                                  )
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "col-12 col-sm-6 col-md-3" },
                              [
                                _c("div", { staticClass: "form-group" }, [
                                  _c(
                                    "label",
                                    { staticClass: "text-secondary" },
                                    [_vm._v("Индекс")]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.receiver[index].index,
                                        expression: "receiver[index].index"
                                      }
                                    ],
                                    staticClass: "form-control",
                                    attrs: { type: "text" },
                                    domProps: {
                                      value: _vm.receiver[index].index
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.receiver[index],
                                          "index",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  })
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "col-12 col-sm-6 col-md-3" },
                              [
                                _c("div", { staticClass: "form-group" }, [
                                  _c(
                                    "label",
                                    { staticClass: "text-secondary" },
                                    [_vm._v("Улица")]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.receiver[index].street,
                                        expression: "receiver[index].street"
                                      }
                                    ],
                                    staticClass: "form-control",
                                    attrs: {
                                      type: "text",
                                      id: "street-" + index
                                    },
                                    domProps: {
                                      value: _vm.receiver[index].street
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.receiver[index],
                                          "street",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c(
                                    "small",
                                    { staticClass: "form-text text-success" },
                                    [_vm._v("Обязательное поле.")]
                                  )
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "col-12 col-sm-6 col-md-3" },
                              [
                                _c("div", { staticClass: "form-group" }, [
                                  _c(
                                    "label",
                                    { staticClass: "text-secondary" },
                                    [_vm._v("Дом")]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.receiver[index].house,
                                        expression: "receiver[index].house"
                                      }
                                    ],
                                    staticClass: "form-control",
                                    attrs: {
                                      type: "text",
                                      id: "house-" + index
                                    },
                                    domProps: {
                                      value: _vm.receiver[index].house
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.receiver[index],
                                          "house",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c(
                                    "small",
                                    { staticClass: "form-text text-success" },
                                    [_vm._v("Обязательное поле.")]
                                  )
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "col-12 col-sm-6 col-md-3" },
                              [
                                _c("div", { staticClass: "form-group" }, [
                                  _c(
                                    "label",
                                    { staticClass: "text-secondary" },
                                    [_vm._v("Офис")]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.receiver[index].office,
                                        expression: "receiver[index].office"
                                      }
                                    ],
                                    staticClass: "form-control",
                                    attrs: { type: "text" },
                                    domProps: {
                                      value: _vm.receiver[index].office
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.receiver[index],
                                          "office",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  })
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "col-12 col-sm-6 col-md-3" },
                              [
                                _c("div", { staticClass: "form-group" }, [
                                  _c(
                                    "label",
                                    { staticClass: "text-secondary" },
                                    [_vm._v("Контактное лицо")]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value:
                                          _vm.receiver[index].contactPerson
                                            .name,
                                        expression:
                                          "receiver[index].contactPerson.name"
                                      }
                                    ],
                                    staticClass: "form-control",
                                    attrs: {
                                      type: "text",
                                      id: "contact-person-name-" + index
                                    },
                                    domProps: {
                                      value:
                                        _vm.receiver[index].contactPerson.name
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.receiver[index].contactPerson,
                                          "name",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c(
                                    "small",
                                    { staticClass: "form-text text-success" },
                                    [_vm._v("Обязательное поле.")]
                                  )
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "col-12 col-sm-6 col-md-3" },
                              [
                                _c("div", { staticClass: "form-group" }, [
                                  _c(
                                    "label",
                                    { staticClass: "text-secondary" },
                                    [_vm._v("Телефон")]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value:
                                          _vm.receiver[index].contactPerson
                                            .phone,
                                        expression:
                                          "receiver[index].contactPerson.phone"
                                      }
                                    ],
                                    staticClass: "form-control",
                                    attrs: {
                                      type: "text",
                                      id: "contact-person-phone-" + index
                                    },
                                    domProps: {
                                      value:
                                        _vm.receiver[index].contactPerson.phone
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.receiver[index].contactPerson,
                                          "phone",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c(
                                    "small",
                                    { staticClass: "form-text text-success" },
                                    [_vm._v("Обязательное поле.")]
                                  )
                                ])
                              ]
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c("hr"),
                        _vm._v(" "),
                        _c("h5", { staticClass: "text-success mt-2 mb-3" }, [
                          _vm._v("Общая информация")
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "row" }, [
                          _c(
                            "div",
                            { staticClass: "col-12 col-sm-6 col-md-3" },
                            [
                              _c("div", { staticClass: "form-group" }, [
                                _c("label", { staticClass: "text-secondary" }, [
                                  _vm._v("К отправлению, мест")
                                ]),
                                _vm._v(" "),
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.receiver[index].info.place,
                                      expression: "receiver[index].info.place"
                                    }
                                  ],
                                  staticClass: "form-control",
                                  attrs: {
                                    type: "text",
                                    id: "contact-info-place-" + index
                                  },
                                  domProps: {
                                    value: _vm.receiver[index].info.place
                                  },
                                  on: {
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.receiver[index].info,
                                        "place",
                                        $event.target.value
                                      )
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _c(
                                  "small",
                                  { staticClass: "form-text text-success" },
                                  [_vm._v("Обязательное поле.")]
                                )
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "col-12 col-sm-6 col-md-3" },
                            [
                              _c("div", { staticClass: "form-group" }, [
                                _c("label", { staticClass: "text-secondary" }, [
                                  _vm._v("Вес, кг")
                                ]),
                                _vm._v(" "),
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.receiver[index].info.weight,
                                      expression: "receiver[index].info.weight"
                                    }
                                  ],
                                  staticClass: "form-control",
                                  attrs: {
                                    type: "text",
                                    id: "contact-info-weight-" + index
                                  },
                                  domProps: {
                                    value: _vm.receiver[index].info.weight
                                  },
                                  on: {
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.receiver[index].info,
                                        "weight",
                                        $event.target.value
                                      )
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _c(
                                  "small",
                                  { staticClass: "form-text text-success" },
                                  [_vm._v("Обязательное поле.")]
                                )
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "col-12 col-sm-6 col-md-3" },
                            [
                              _c("div", { staticClass: "form-group" }, [
                                _c("label", { staticClass: "text-secondary" }, [
                                  _vm._v("Объем, м3")
                                ]),
                                _vm._v(" "),
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.receiver[index].info.volume,
                                      expression: "receiver[index].info.volume"
                                    }
                                  ],
                                  staticClass: "form-control",
                                  attrs: {
                                    type: "text",
                                    id: "contact-info-volume-" + index
                                  },
                                  domProps: {
                                    value: _vm.receiver[index].info.volume
                                  },
                                  on: {
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.receiver[index].info,
                                        "volume",
                                        $event.target.value
                                      )
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _c(
                                  "small",
                                  { staticClass: "form-text text-success" },
                                  [_vm._v("Обязательное поле.")]
                                )
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "col-12 col-sm-6 col-md-3" },
                            [
                              _c("div", { staticClass: "form-group" }, [
                                _c("label", { staticClass: "text-secondary" }, [
                                  _vm._v("Примечание")
                                ]),
                                _vm._v(" "),
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value:
                                        _vm.receiver[index].info.annotation,
                                      expression:
                                        "receiver[index].info.annotation"
                                    }
                                  ],
                                  staticClass: "form-control",
                                  attrs: { type: "text" },
                                  domProps: {
                                    value: _vm.receiver[index].info.annotation
                                  },
                                  on: {
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.receiver[index].info,
                                        "annotation",
                                        $event.target.value
                                      )
                                    }
                                  }
                                })
                              ])
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("hr"),
                        _vm._v(" "),
                        _c("h5", { staticClass: "text-success mt-2 mb-3" }, [
                          _vm._v("Тип оплаты")
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "row" }, [
                          _c("div", { staticClass: "col-12 col-sm-6" }, [
                            _c("div", { staticClass: "form-group mt-4" }, [
                              _c("div", { staticClass: "form-check" }, [
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value:
                                        _vm.receiver[index].payment.personType,
                                      expression:
                                        "receiver[index].payment.personType"
                                    }
                                  ],
                                  staticClass: "form-check-input",
                                  attrs: {
                                    type: "radio",
                                    id: "radio-payment-person-" + index,
                                    value: "0",
                                    checked: ""
                                  },
                                  domProps: {
                                    checked: _vm._q(
                                      _vm.receiver[index].payment.personType,
                                      "0"
                                    )
                                  },
                                  on: {
                                    change: function($event) {
                                      return _vm.$set(
                                        _vm.receiver[index].payment,
                                        "personType",
                                        "0"
                                      )
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _c(
                                  "label",
                                  {
                                    staticClass: "form-check-label",
                                    attrs: {
                                      for: "radio-payment-person-" + index
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "\n                                            Отправителем\n                                        "
                                    )
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "form-check" }, [
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value:
                                        _vm.receiver[index].payment.personType,
                                      expression:
                                        "receiver[index].payment.personType"
                                    }
                                  ],
                                  staticClass: "form-check-input",
                                  attrs: {
                                    type: "radio",
                                    id: "radio-payment-person-1-" + index,
                                    value: "1"
                                  },
                                  domProps: {
                                    checked: _vm._q(
                                      _vm.receiver[index].payment.personType,
                                      "1"
                                    )
                                  },
                                  on: {
                                    change: function($event) {
                                      return _vm.$set(
                                        _vm.receiver[index].payment,
                                        "personType",
                                        "1"
                                      )
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _c(
                                  "label",
                                  {
                                    staticClass: "form-check-label",
                                    attrs: {
                                      for: "radio-payment-person-1-" + index
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "\n                                            Получателем\n                                        "
                                    )
                                  ]
                                )
                              ])
                            ])
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "col-12 col-sm-6" }, [
                            _c("div", { staticClass: "form-group" }, [
                              _c(
                                "label",
                                { attrs: { for: "payment_type_1" } },
                                [_vm._v("Способ оплаты")]
                              ),
                              _vm._v(" "),
                              _c(
                                "select",
                                {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.receiver[index].payment.type,
                                      expression: "receiver[index].payment.type"
                                    }
                                  ],
                                  staticClass: "form-control text-capitalize",
                                  attrs: {
                                    name: "payment_type_1",
                                    id: "payment_type_1"
                                  },
                                  on: {
                                    change: function($event) {
                                      var $$selectedVal = Array.prototype.filter
                                        .call($event.target.options, function(
                                          o
                                        ) {
                                          return o.selected
                                        })
                                        .map(function(o) {
                                          var val =
                                            "_value" in o ? o._value : o.value
                                          return val
                                        })
                                      _vm.$set(
                                        _vm.receiver[index].payment,
                                        "type",
                                        $event.target.multiple
                                          ? $$selectedVal
                                          : $$selectedVal[0]
                                      )
                                    }
                                  }
                                },
                                _vm._l(
                                  _vm.receiver[index].payment.typeList,
                                  function(payment, paymentIndex) {
                                    return _c(
                                      "option",
                                      { domProps: { value: paymentIndex } },
                                      [_vm._v("@" + _vm._s(payment))]
                                    )
                                  }
                                ),
                                0
                              )
                            ])
                          ])
                        ]),
                        _vm._v(" "),
                        _c("hr"),
                        _vm._v(" "),
                        _c("h5", { staticClass: "text-success mt-2 mb-3" }, [
                          _vm._v("Тип доставки")
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "row" }, [
                          _c(
                            "div",
                            { staticClass: "col-12 col-sm-6 col-md-4" },
                            [
                              _c("div", { staticClass: "form-group mt-3" }, [
                                _c("div", { staticClass: "form-check" }, [
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.receiver[index].deliver.type,
                                        expression:
                                          "receiver[index].deliver.type"
                                      }
                                    ],
                                    staticClass: "form-check-input",
                                    attrs: {
                                      type: "radio",
                                      id: "radio-payment-deliver-type-" + index,
                                      value: "0",
                                      checked: ""
                                    },
                                    domProps: {
                                      checked: _vm._q(
                                        _vm.receiver[index].deliver.type,
                                        "0"
                                      )
                                    },
                                    on: {
                                      change: function($event) {
                                        return _vm.$set(
                                          _vm.receiver[index].deliver,
                                          "type",
                                          "0"
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c(
                                    "label",
                                    {
                                      staticClass: "form-check-label",
                                      attrs: {
                                        for:
                                          "radio-payment-deliver-type-" + index
                                      }
                                    },
                                    [
                                      _vm._v(
                                        "\n                                            Стандарт\n                                        "
                                      )
                                    ]
                                  )
                                ]),
                                _vm._v(" "),
                                _c("div", { staticClass: "form-check" }, [
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.receiver[index].deliver.type,
                                        expression:
                                          "receiver[index].deliver.type"
                                      }
                                    ],
                                    staticClass: "form-check-input",
                                    attrs: {
                                      type: "radio",
                                      id:
                                        "radio-payment-deliver-type-1-" + index,
                                      value: "1"
                                    },
                                    domProps: {
                                      checked: _vm._q(
                                        _vm.receiver[index].deliver.type,
                                        "1"
                                      )
                                    },
                                    on: {
                                      change: function($event) {
                                        return _vm.$set(
                                          _vm.receiver[index].deliver,
                                          "type",
                                          "1"
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c(
                                    "label",
                                    {
                                      staticClass: "form-check-label",
                                      attrs: {
                                        for:
                                          "radio-payment-deliver-type-1-" +
                                          index
                                      }
                                    },
                                    [
                                      _vm._v(
                                        "\n                                            Экспресс\n                                        "
                                      )
                                    ]
                                  )
                                ]),
                                _vm._v(" "),
                                _c("div", { staticClass: "form-check" }, [
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.receiver[index].deliver.type,
                                        expression:
                                          "receiver[index].deliver.type"
                                      }
                                    ],
                                    staticClass: "form-check-input",
                                    attrs: {
                                      type: "radio",
                                      id:
                                        "radio-payment-deliver-type-2-" + index,
                                      value: "2"
                                    },
                                    domProps: {
                                      checked: _vm._q(
                                        _vm.receiver[index].deliver.type,
                                        "2"
                                      )
                                    },
                                    on: {
                                      change: function($event) {
                                        return _vm.$set(
                                          _vm.receiver[index].deliver,
                                          "type",
                                          "2"
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c(
                                    "label",
                                    {
                                      staticClass: "form-check-label",
                                      attrs: {
                                        for:
                                          "radio-payment-deliver-type-2-" +
                                          index
                                      }
                                    },
                                    [
                                      _vm._v(
                                        "\n                                            Ускоренная ЖД\n                                        "
                                      )
                                    ]
                                  )
                                ])
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "col-12 col-sm-6 col-md-4" },
                            [
                              _c("div", { staticClass: "form-group" }, [
                                _c("label", { staticClass: "text-secondary" }, [
                                  _vm._v("Наложенный платеж")
                                ]),
                                _vm._v(" "),
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value:
                                        _vm.receiver[index].deliver.payment,
                                      expression:
                                        "receiver[index].deliver.payment"
                                    }
                                  ],
                                  staticClass: "form-control",
                                  attrs: { type: "text" },
                                  domProps: {
                                    value: _vm.receiver[index].deliver.payment
                                  },
                                  on: {
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.receiver[index].deliver,
                                        "payment",
                                        $event.target.value
                                      )
                                    }
                                  }
                                })
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "col-12 col-sm-6 col-md-4" },
                            [
                              _c("div", { staticClass: "form-group" }, [
                                _c("label", { staticClass: "text-secondary" }, [
                                  _vm._v("Объявленная стоимость")
                                ]),
                                _vm._v(" "),
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.receiver[index].deliver.price,
                                      expression:
                                        "receiver[index].deliver.price"
                                    }
                                  ],
                                  staticClass: "form-control",
                                  attrs: { type: "text" },
                                  domProps: {
                                    value: _vm.receiver[index].deliver.price
                                  },
                                  on: {
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.receiver[index].deliver,
                                        "price",
                                        $event.target.value
                                      )
                                    }
                                  }
                                })
                              ])
                            ]
                          )
                        ])
                      ])
                    ]
                  )
                }),
                0
              ),
              _vm._v(" "),
              _c("div", { staticClass: "row justify-content-sm-center mb-3" }, [
                _c("div", { staticClass: "col-12 col-sm-5" }, [
                  _c(
                    "button",
                    {
                      staticClass:
                        "btn btn-primary btn-block mt-3 new-receiver",
                      attrs: { type: "submit" },
                      on: { click: _vm.newReceiver }
                    },
                    [_vm._v("Добавить получателя")]
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "row justify-content-sm-center" }, [
                _c("div", { staticClass: "col-12 col-sm-5" }, [
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-success btn-block",
                      attrs: { type: "submit" },
                      on: { click: _vm.readyOrder }
                    },
                    [_vm._v("Добавить заказ")]
                  )
                ])
              ])
            ]
          )
        ])
      ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () { injectStyles.call(this, this.$root.$options.shadowRoot) }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/components/orders/OrdersComponent.vue":
/*!************************************************************!*\
  !*** ./resources/js/components/orders/OrdersComponent.vue ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _OrdersComponent_vue_vue_type_template_id_7ce16d59___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./OrdersComponent.vue?vue&type=template&id=7ce16d59& */ "./resources/js/components/orders/OrdersComponent.vue?vue&type=template&id=7ce16d59&");
/* harmony import */ var _OrdersComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./OrdersComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/orders/OrdersComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _OrdersComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _OrdersComponent_vue_vue_type_template_id_7ce16d59___WEBPACK_IMPORTED_MODULE_0__["render"],
  _OrdersComponent_vue_vue_type_template_id_7ce16d59___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/orders/OrdersComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/orders/OrdersComponent.vue?vue&type=script&lang=js&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/orders/OrdersComponent.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OrdersComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./OrdersComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/orders/OrdersComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OrdersComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/orders/OrdersComponent.vue?vue&type=template&id=7ce16d59&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/components/orders/OrdersComponent.vue?vue&type=template&id=7ce16d59& ***!
  \*******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OrdersComponent_vue_vue_type_template_id_7ce16d59___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./OrdersComponent.vue?vue&type=template&id=7ce16d59& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/orders/OrdersComponent.vue?vue&type=template&id=7ce16d59&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OrdersComponent_vue_vue_type_template_id_7ce16d59___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OrdersComponent_vue_vue_type_template_id_7ce16d59___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);