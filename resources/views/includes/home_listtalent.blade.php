 <div class="home-list-talent">
  <div data-testid="skills-list-group" class="container listtalent">
   @foreach ($talent_categories as $talent_category)

      <div data-testid="skills-list-container" class="">
      <h2 class="_8hq62nwZ list-talent-title" data-testid="skills-list-title">BestJobs {{$talent_category['category']}}</h2>
   
      
         @if($talent_category['category'] == 'Finance Experts')
            <ul class="zjL-4_Jqq">
         @else
            <ul class="zjL-4_Jq zjL-4_JqqQ">
         @endif
         @foreach($talent_category['talent_list'] as $talent)

            <li class=""><a href="/talents/{{$talent['job_skill']}}" data-testid="skill-link" class="">{{$talent['job_skill']}}</a></li>
            
         @endforeach
         <li class="">
               <a href="/designers" class="_33DCQ6Tb  ">
                  <span class="">View More Freelance&nbsp;Designers </span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                  </svg>
               </a>
            </li>
         </ul>
         </ul>
      </div>
      <hr>
      @endforeach
   </div>
   </div>