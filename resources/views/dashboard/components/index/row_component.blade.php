<div class="plan-container ">
    <div class="plan green ">
        <div class="plan-header">
            <div class="plan-price">
                <i class="mdi {{ $section['icon']}}"></i>
            </div>
        </div>
        <div class="plan-actions">
            <a href="{{$section['href']!='#'?route($section['href']):$section['href']}}"
               class="btn">{{ $section['title']}}</a>
        </div>
    </div>
</div>
