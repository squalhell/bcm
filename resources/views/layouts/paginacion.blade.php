@if ($pagination->lastPage() > 1)
<tr>
  <td bgcolor="#333333"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody><tr>
      <td width="10%" height="23" align="center" valign="middle" bgcolor="#000000" class="prsnal_red">Paginas</td>
      <td width="90%" class="Title02">      
         @for ($i = 1; $i <= $pagination->lastPage(); $i++)
          @if($pagination->currentPage() === $i)
            <span class="c-relatores__item c-relatores__item--active">{{ $i }}</span>
          @else     
            <a href="{{ $pagination->url($i) }}"><font color="#FF3300">{{ $i }}</font></a>       
          @endif
        @endfor     
      </td>
    </tr>
  </tbody></table></td>
</tr>
@endif