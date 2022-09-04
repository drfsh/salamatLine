<div class="GlobalSide">
    <div class="gap"></div>
    <ul class="vertical">
        <li>
            <a style="padding: 0" href="{{route('admin')}}">
                <span>پنل مدیریت سلامت لاین</span>
            </a>
        </li>
        <hr>
        <li>
            <a  class="{{\App\Traits\CheckRoute::check('users.index')}}" href="{{ route('users.index') }}">
                <i class="fas fa-user"></i>
                <span>کاربران و مدیران </span>
            </a>
        </li>

        <li>
            <a  class="{{\App\Traits\CheckRoute::check('AddressList')}}" href="{{ route('AddressList') }}">
                <i class="fas fa-map-marked-alt"></i>
                <span>آدرس‌ها</span>
            </a>
        </li>
        <hr>
        {{-- 		<li>
                    <a href="{{ route('ComponentAdmin') }}">
                        <i class="fas fa-list"></i>
                        <span>کامپوننت‌ها</span>
                    </a>
                </li> --}}
        <li>
            <a  class="{{\App\Traits\CheckRoute::check('AdminInvoice')}}" href="{{ route('AdminInvoice') }}">
                <i class="fas fa-file-invoice-dollar"></i>
                <span>سفارشات</span>
            </a>
        </li>
        <li>
            <a  class="{{\App\Traits\CheckRoute::check('product.index')}}" href="{{ route('product.index') }}">
                <i class="far fa-clone"></i>
                <span>محصولات</span>
            </a>
        </li>
        <li>
            <a  class="{{\App\Traits\CheckRoute::check('category.index')}}" href="{{ route('category.index') }}">
                <i class="fas fa-cubes"></i>
                <span>دسته‌بندی‌ها و برندها</span>
            </a>
        </li>
        <li>
            <a  class="{{\App\Traits\CheckRoute::check('Inventory')}}" href="{{ route('Inventory') }}">
                <i class="fas fa-warehouse"></i>
                <span>انبار</span>
            </a>
        </li>
        <li>
            <a  class="{{\App\Traits\CheckRoute::check('discount.index')}}" href="{{ route('discount.index') }}">
                <i class="fas fa-percent"></i>
                <span>تخفیفات</span>
            </a>
        </li>

        <li>
            <a class="{{\App\Traits\CheckRoute::check('ShowSurvey')}}" href="{{ route('ShowSurvey') }}">
                <i class="fas fa-poll-h"></i>
                <span>نظرسنجی سفارشات</span>
            </a>
        </li>

        <li>
            <a class="{{\App\Traits\CheckRoute::check('UnReviewrate')}}" href="{{ route('UnReviewrate') }}">
                <i class="fas fa-star-half-alt"></i>
                <span>نظرات و امتیازات</span>
            </a>
        </li>
        <li>
            <a class="{{\App\Traits\CheckRoute::check('AdminReport')}}" href="{{ route('AdminReport') }}">
                <i class="fas fa-chart-line"></i>
                <span>گزارشات</span>
            </a>
        </li>
        <hr>
        <li>
            <a class="{{\App\Traits\CheckRoute::check('slider.index')}}" href="{{ route('slider.index') }}">
                <i class="far fa-file-alt"></i>
                <span>اسلایدر و صفحات</span>
            </a>
        </li>
        <li>
            <a class="{{\App\Traits\CheckRoute::check('holiday.index')}}" href="{{ route('holiday.index') }}">
                <i class="fas fa-calendar-week"></i>
                <span>تعطیلات و روزهای عدم تحویل</span>
            </a>
        </li>
        <li>
            <a class="{{\App\Traits\CheckRoute::check('contactinfo.index')}}" href="{{ route('contactinfo.index') }}">
                <i class="fas fa-mail-bulk"></i>
                <span>اطلاعات و فرم تماس</span>
            </a>
        </li>
        <li>
            <a class="{{\App\Traits\CheckRoute::check('AdminRestock')}}" href="{{ route('AdminRestock') }}">
                <i class="fas fa-bell"></i>
                <span>موجود شد خبر بده!</span>
            </a>
        </li>
        <li>
            <a class="{{\App\Traits\CheckRoute::check('newsletter.index')}}" href="{{ route('newsletter.index') }}">
                <i class="fas fa-bell"></i>
                <span>خبرنامه</span>
            </a>
        </li>
    </ul>
    <div class="today">{{Verta::today()->format('l %d %B %Y')}}</div>
</div>
