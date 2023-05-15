<div class="formrow {!! APFrmErrHelp::hasError($errors, 'tags') !!}"> 
    {!! Form::text('tags', null, array('class'=>'tagged form-control', 'data-removeBtn' => 'true', 'id'=>'exist-values', 'placeholder'=>__('Add Tags'))) !!}
    {!! APFrmErrHelp::showErrors($errors, 'tags') !!} 
</div>
@push('styles')
    <style>
        .tags-container {
            display: flex;
            flex-flow: row wrap;
            margin-bottom: 15px;
            width: 100%;
            min-height: 34px;
            padding: 2px 5px;
            font-size: 14px;
            line-height: 1.6;
            background-color: transparent;
            border: 1px solid #ccc;
            border-radius: 1px;
            overflow: hidden;
            word-wrap: break-word;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        input.tag-input {
            flex: 3;
            border: 0;
            outline: 0;
        }
        .tag {
            position: relative;
            margin: 2px 6px 2px 0;
            padding: 1px 20px 1px 8px;
            font-size: inherit;
            font-weight: 400;
            text-align: center;
            color: #fff;
            background-color: #317caf;
            border-radius: 3px;
            transition: background-color 0.3s ease;
            cursor: default;
        }
        .tag:first-child {
            margin-left: 0;
        }
        .tag--marked {
            background-color: #6fadd7;
        }
        .tag--exists {
            background-color: #edb5a1;
            animation: shake 1s linear;
        }
        .tag__name {
            margin-right: 3px;
        }
        .tag__remove {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 20px;
            height: 100%;
            padding: 0 5px;
            font-size: 16px;
            font-weight: 400;
            transition: opacity 0.3s ease;
            opacity: 0.5;
            cursor: pointer;
            border: 0;
            background-color: transparent;
            color: #fff;
            line-height: 1;
        }
        .tag__remove:hover {
            opacity: 1;
        }
        .tag__remove:focus {
            outline: 5px auto #fff;
        }
        @keyframes shake {
            0%, 100% {
                transform: translate3d(0, 0, 0);
            }
            10%, 30%, 50%, 70%, 90% {
                transform: translate3d(-5px, 0, 0);
            }
            20%, 40%, 60%, 80% {
                transform: translate3d(5px, 0, 0);
            }
        }
 
    </style>
@endpush

@push('scripts')
    <script>
        (function() {

        'use strict';

        // Helpers
        function $$(selectors, context) {
            return (typeof selectors === 'string') ? (context || document).querySelectorAll(selectors) : [selectors];
        }

        function $(selector, context) {
            return (typeof selector === 'string') ? (context || document).querySelector(selector) : selector;
        }

        function create(tag, attr) {
            var element = document.createElement(tag);
            if(attr) {
                for(var name in attr) {
                if(element[name] !== undefined) {
                    element[name] = attr[name];
                }
                }
            }
            return element;
        }

        function whichTransitionEnd() {
            var root = document.documentElement;
            var transitions = {
                'transition'       : 'transitionend',
                'WebkitTransition' : 'webkitTransitionEnd',
                'MozTransition'    : 'mozTransitionEnd',
                'OTransition'      : 'oTransitionEnd otransitionend'
            };

            for(var t in transitions){
                if(root.style[t] !== undefined){
                    return transitions[t];
                }
            }
            return false;
        }

        function oneListener(el, type, fn, capture) {
            capture = capture || false;
            el.addEventListener(type, function handler(e) {
                fn.call(this, e);
                el.removeEventListener(e.type, handler, capture)
            }, capture);
        }

        function hasClass(cls, el) {
            return new RegExp('(^|\\s+)' + cls + '(\\s+|$)').test(el.className);
        }

        function addClass(cls, el) {
            if( ! hasClass(cls, el) )
                return el.className += (el.className === '') ? cls : ' ' + cls;
        }

        function removeClass(cls, el) {
            el.className = el.className.replace(new RegExp('(^|\\s+)' + cls + '(\\s+|$)'), '');
        }

        function toggleClass(cls, el) {
            ( ! hasClass(cls, el)) ? addClass(cls, el) : removeClass(cls, el);
        }

        function Tags(tag) {

            var el = $(tag);

            if(el.instance) return;
            el.instance = this;

            var type = el.type;
            var transitionEnd = whichTransitionEnd();

            var tagsArray = [];
            var KEYS = {
                ENTER: 13,
                COMMA: 188,
                BACK: 8
            };
            var isPressed = false;

            var timer;
            var wrap;
            var field;

            function init() {

                // create and add wrapper
                wrap = create('div', {
                    'className': 'tags-container',
                });
                field = create('input', {
                    'type': 'text',
                    'className': 'tag-input',
                    'placeholder': el.placeholder || ''
                });

                wrap.appendChild(field);

                if(el.value.trim() !== '') {
                    hasTags();
                }

                el.type = 'hidden';
                el.parentNode.insertBefore(wrap, el.nextSibling);

                wrap.addEventListener('click', btnRemove, false);
                wrap.addEventListener('keydown', keyHandler, false);
                wrap.addEventListener('keyup', backHandler, false);
            }

            function hasTags() {
                var arr = el.value.trim().split(',');
                arr.forEach(function(item) {
                    item = item.trim();
                    if(~tagsArray.indexOf(item)) {
                        return;
                    }
                    var tag = createTag(item);
                    tagsArray.push(item);
                    wrap.insertBefore(tag, field);
                });
            }

            function createTag(name) {
                var tag = create('div', {
                    'className': 'tag',
                    'innerHTML': '<span class="tag__name">' + name + '</span>'+
                                '<button class="tag__remove">&times;</button>'
                });
                return tag;
            }

            function btnRemove(e) {
                e.preventDefault();
                if(e.target.className === 'tag__remove') {
                    var tag  = e.target.parentNode;
                    var name = $('.tag__name', tag);
                    wrap.removeChild(tag);
                    tagsArray.splice(tagsArray.indexOf(name.textContent), 1);
                    el.value = tagsArray.join(',')
                }
                field.focus();
            }

            function keyHandler(e) {

                if(e.target.tagName === 'INPUT' && e.target.className === 'tag-input') {

                    var target = e.target;
                    var code = e.which || e.keyCode;

                    if(field.previousSibling && code !== KEYS.BACK) {
                        removeClass('tag--marked', field.previousSibling);
                    }

                    var name = target.value.trim();

                    // if(code === KEYS.ENTER || code === KEYS.COMMA) {
                    if(code === KEYS.ENTER) {

                        target.blur();

                        addTag(name);

                        if(timer) clearTimeout(timer);
                        timer = setTimeout(function() { target.focus(); }, 10 );
                    }
                    else if(code === KEYS.BACK) {
                        if(e.target.value === '' && !isPressed) {
                            isPressed = true;
                            removeTag();
                        }
                    }
                }
            }
            function backHandler(e) {
                isPressed = false;
            }

            function addTag(name) {

                // delete comma if comma exists
                name = name.toString().replace(/,/g, '').trim();

                if(name === '') return field.value = '';

                if(~tagsArray.indexOf(name)) {

                    var exist = $$('.tag', wrap);

                    Array.prototype.forEach.call(exist, function(tag) {
                        if(tag.firstChild.textContent === name) {

                            addClass('tag--exists', tag);

                            if(transitionEnd) {
                                oneListener(tag, transitionEnd, function() {
                                    removeClass('tag--exists', tag);
                                });
                            } else {
                                removeClass('tag--exists', tag);
                            }


                        }

                    });

                    return field.value = '';
                }

                var tag = createTag(name);
                wrap.insertBefore(tag, field);
                tagsArray.push(name);
                field.value = '';
                el.value += (el.value === '') ? name : ',' + name;
            }

            function removeTag() {
                if(tagsArray.length === 0) return;

                var tags = $$('.tag', wrap);
                var tag = tags[tags.length - 1];

                if( ! hasClass('tag--marked', tag) ) {
                    addClass('tag--marked', tag);
                    return;
                }

                tagsArray.pop();

                wrap.removeChild(tag);

                el.value = tagsArray.join(',');
            }

            init();

        }

        window.Tags = Tags;

    })();

        // Use
        var tags = new Tags('.tagged');

       
    </script>
@endpush