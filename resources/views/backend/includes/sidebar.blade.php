<div class="vertical-menu">
    <div data-simplebar class="h-100" style="overflow-y: auto;">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                {{--                {{ creation('Photo','Photo',true,true) }}--}}
                {{--                {{ creation('Video','Video',true,false) }}--}}
                <li>
                    <a href="{{ route('backend.dashboard') }}" class="waves-effect">
                        <i class="ri-home-4-fill"></i>
                        <span>@lang('backend.dashboard')</span>
                    </a>
                </li>
                <li class="menu-title">@lang('backend.site-setting')</li>
                @can('slider index')
                    <li>
                        <a href="{{ route('backend.slider.index') }}" class="waves-effect">
                            <i class="fas fa-sliders-h"></i>
                            <span>@lang('backend.slider')</span>
                        </a>
                    </li>
                @endcan
                @can('service index')
                    <li>
                        <a href="{{ route('backend.service.index') }}" class="waves-effect">
                            <i class="fas fa-wrench"></i>
                            <span>@lang('backend.service')</span>
                        </a>
                    </li>
                @endcan
                @can('product index')
                    <li>
                        <a href="{{ route('backend.product.index') }}" class="waves-effect">
                            <i class="fas fa-video"></i>
                            <span>@lang('backend.product')</span>
                        </a>
                    </li>
                @endcan
                @can('project index')
                    <li>
                        <a href="{{ route('backend.project.index') }}" class="waves-effect">
                            <i class="fas fa-project-diagram"></i>
                            <span>@lang('backend.project')</span>
                        </a>
                    </li>
                @endcan
                @can('partner index')
                    <li>
                        <a href="{{ route('backend.partner.index') }}" class="waves-effect">
                            <i class="fas fa-link"></i>
                            <span>@lang('backend.partner')</span>
                        </a>
                    </li>
                @endcan
                @can('sertificate index')
                    <li>
                        <a href="{{ route('backend.sertificate.index') }}" class="waves-effect">
                            <i class="fas fa-certificate"></i>
                            <span>@lang('backend.sertificate')</span>
                        </a>
                    </li>
                @endcan
                @canany(['photo index','video index'])
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-briefcase"></i>
                            <span>@lang('backend.gallery')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('backend.photo.index') }}">
                                    @lang('backend.photo') (@lang('backend.gallery'))
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backend.video.index') }}">
                                    @lang('backend.video') (@lang('backend.gallery'))
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcanany

                @can('about index')
                    <li>
                        <a href="{{ route('backend.about.index') }}" class="waves-effect">
                            <i class="fas fa-info"></i>
                            <span>@lang('backend.about')</span>
                        </a>
                    </li>
                @endcan
                {{--                @can('content index')--}}
                {{--                    <li>--}}
                {{--                        <a href="{{ route('backend.content.index') }}" class="waves-effect">--}}
                {{--                            <i class="fas fa-file"></i>--}}
                {{--                            <span>@lang('backend.content')</span>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                {{--                @endcan--}}
                {{--                @can('categories index')--}}
                {{--                    <li>--}}
                {{--                        <a href="{{ route('backend.categories.index') }}" class="waves-effect">--}}
                {{--                            <i class="fas fa-bars"></i>--}}
                {{--                            <span>@lang('backend.categories')</span>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                {{--                @endcan--}}
                {{--                @can('faq index')--}}
                {{--                    <li>--}}
                {{--                        <a href="{{ route('backend.faq.index') }}" class="waves-effect">--}}
                {{--                            <i class="fas fa-question"></i>--}}
                {{--                            <span>@lang('backend.faq')</span>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                {{--                @endcan--}}
                {{--                @can('catalog index')--}}
                {{--                    <li>--}}
                {{--                        <a href="{{ route('backend.catalog.index') }}" class="waves-effect">--}}
                {{--                            <i class="fas fa-images"></i>--}}
                {{--                            <span>@lang('backend.catalog')</span>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                {{--                @endcan--}}
                {{--                @can('media index')--}}
                {{--                    <li>--}}
                {{--                        <a href="{{ route('backend.media.index') }}" class="waves-effect">--}}
                {{--                            <i class="fas fa-photo-video"></i>--}}
                {{--                            <span>@lang('backend.media')</span>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                {{--                @endcan--}}
                {{--                @can('portfolio index')--}}
                {{--                    <li>--}}
                {{--                        <a href="{{ route('backend.portfolio.index') }}" class="waves-effect">--}}
                {{--                            <i class="fas fa-portrait"></i>--}}
                {{--                            <span>@lang('backend.portfolio')</span>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                {{--                @endcan--}}

                {{--                @can('blog index')--}}
                {{--                    <li>--}}
                {{--                        <a href="{{ route('backend.blog.index') }}" class="waves-effect">--}}
                {{--                            <i class="fas fa-blog"></i>--}}
                {{--                            <span>@lang('backend.blog')</span>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                {{--                @endcan--}}
                @can('languages index')
                    <li>
                        <a href="{{ route('backend.site-languages.index') }}" class="waves-effect">
                            <i class="fas fa-language"></i>
                            <span>@lang('backend.languages')</span>
                        </a>
                    </li>
                @endcan
                {{--                @can('contact index')--}}
                {{--                    <li>--}}
                {{--                        <a href="{{ route('backend.contact-us.index') }}" class="waves-effect">--}}
                {{--                            <i class="ri-contacts-fill"></i>--}}
                {{--                            <span>@lang('backend.contact-us')</span>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                {{--                @endcan--}}
                @can('settings index')
                    <li>
                        <a href="{{ route('backend.settings.index') }}" class="waves-effect">
                            <i class="ri-settings-2-fill"></i>
                            <span>@lang('backend.settings')</span>
                        </a>
                    </li>
                @endcan
                <li class="menu-title">@lang('backend.ap-setting')</li>
                @can('users index')
                    <li>
                        <a href="{{ route('backend.users.index') }}" class=" waves-effect">
                            <i class="ri-account-circle-fill"></i>
                            <span>@lang('backend.users')</span>
                        </a>
                    </li>
                @endcan
                @can('permissions index')
                    <li>
                        <a href="{{ route('backend.permissions.index') }}" class=" waves-effect">
                            <i class="ri-lock-2-fill"></i>
                            <span>@lang('backend.permissions')</span>
                        </a>
                    </li>
                @endcan
                @can('report index')
                    <li>
                        <a href="{{ route('backend.report') }}" class="waves-effect">
                            <i class="fas fa-file"></i>
                            <span>@lang('backend.report')</span>
                        </a>
                    </li>
                @endcan
                @can('dodenv index')
                    <li>
                        <a target="_blank" href="{{ url('admin/env') }}" class="waves-effect">
                            <i class="fab fa-envira"></i>
                            <span>@lang('backend.dod-env')</span>
                        </a>
                    </li>
                @endcan
                @can('languages index')
                    <li>
                        <a target="_blank" href="{{ url('admin/manage-languages') }}" class="waves-effect">
                            <i class="fas fa-flag"></i>
                            <span>@lang('backend.language-panel')</span>
                        </a>
                    </li>
                @endcan
                <li class="menu-title">@lang('backend.user-setting')</li>
                <li>
                    <a href="{{ route('backend.informations.index') }}" class=" waves-effect">
                        <i class="ri-information-fill"></i>
                        <span>@lang('backend.informations')</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
