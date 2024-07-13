@include('layout.header')
@include('layout.navbar')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<style>
    #sample-photo {
        width: 20pc;
        height: 20pc;
        flex: 1;
    }

    .header {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #A19158;
        padding: 15px 0;
        color: white;
        font-size: 34px;
        font-family: 'Inter';
        font-weight: 800;
        font-style: normal;
        margin-top: -90px;
    }

    body {
        margin-left: 100px;
        margin-right: 100px;
    }

    p {
        color: black;
    }

    a {
        text-decoration: none;
    }

    #first-content {
        /* background-image: url('assets/images/BG.png'); */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 40vw;
        object-fit: contain;
        margin-bottom: 2000px;
        color: #283971;
    }

    #home-text {
        color: #283971;
        font-size: 16px;
        line-height: 1.6;
        width: 50em;
        text-align: justify;
    }

    .mandate-vision-section {
        display: flex;
        flex-wrap: wrap;
        width: 50em;
        margin-top: 30px;
        
    }

    .box {
        flex: 1 1 30%;
        margin: 10px;
        padding: 20px;
        border: 1px solid #ccc;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        text-align: center;
    }

    .icon {
        font-size: 30px;
    }

    .text {
        margin-top: 10px;
        color: #283971;
    }

    #importance-section {
        margin-top: 30px;
    }

    h2 {
        margin-top: 30px;
    }

    .headers {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 48px;
        line-height: 58px;
        text-align: center;

        color: #283971;
        margin-top: 99px;
    }

    .horizontal-line {
        background-color: #283971;
        width: 50%;
        margin: auto;
        border-top: 4px solid #283971 !important;
        border-radius: 14px;
        margin-top: 36px;
        margin-bottom: -60px;
    }

    .bgslp-image {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }
</style>
@include('shared.success-message')
@include('shared.error-message')
<body>
    <h1 class="headers">ABOUT US</h1>
    <hr class="horizontal-line">
    <div class="container-fluid" id="first-content">
        <div class="row gy-3">
            <!-- Main Body -->
            <div class="mainContent">
                <div class="row gy-3">
                    <div class="col-md-11" class="cardClass">
                        <div id="home-box">
                            <div id="home-layer">
                                <div class="home-article">
                                    <h2>Program Overview and Rationale</h2>
                                    <p id="home-text">
                                        The Xavier Ateneo Service Learning Program (SLP) integrates academic instruction,meaningful
                                        service, and critical reflective thinking to promote student learning and civic responsibility.
                                        Anchored on the learning competencies of the subject, it combines formal classroom instruction
                                        with local community engagement.
                                    </p>
                                </div>
                                <div id="importance-section">
                                    <h2>Importance of Service Learning </h2>
                                    <ul>
                                        <li>🌍 Provides relevant service in the community.</li>
                                        <li>📚 Enhances academic learning.</li>
                                        <li>🔄 Translates theory into practice.</li>
                                        <li>👥 Fosters purposeful civic learning through lived experiences.</li>
                                        <li>🤝 Aligns with the Jesuit mission of solidarity with those in need and the United Nations’ Sustainable Development Goals.</li>
                                    </ul>
                                </div>
                                <h2 style="text-align: center;">Mandate and Vision</h2>
                                <div class="mandate-vision-section">
                                    <div class="box">
                                        <div class="icon">🔍</div>
                                        <div class="text">Mandated by Xavier Ateneo President Fr. Roberto C Yap SJ in SY 2016-2017.</div>
                                    </div>
                                    <div class="box">
                                        <div class="icon">🎯</div>
                                        <div class="text">Aims to broaden research and strengthen students’ social formation.</div>
                                    </div>
                                    <div class="box">
                                        <div class="icon">🔄</div>
                                        <div class="text">Encourages discipline- or course-based engagement.</div>
                                    </div>
                                    <div class="box">
                                        <div class="icon">🏞️</div>
                                        <div class="text">Emphasizes collaborative work within a community context.</div>
                                    </div>
                                    <div class="box">
                                        <div class="icon">🕊️</div>
                                        <div class="text">Inspired by the Ignatian perspective of forming men and women for and with others.</div>
                                    </div>
                                    <div class="box">
                                        <div class="icon">📈</div>
                                        <div class="text">Empowers communities to drive sustainable change.</div>
                                    </div>
                                </div>
                                <div class="characteristics-section">
                                    <h2>Characteristics of XU – SLP</h2>
                                    <ul>
                                        <li>Competence: Acquired theories, knowledge, and skill sets</li>
                                        <li>Contact: Engagement with communities to understand social conditions</li>
                                        <li>Compassion: Strengthening the value of preferential option for the poor through reflection</li>
                                    </ul>
                                </div>
                                <div class="desired-outcomes-section">
                                    <h2>Desired Outcomes</h2>
                                    <p id="home-text">
                                        It aspires to produce professionals with a heart-for-and-with-others - able to apply their academic
                                        competence and training in the service of nation-building, conscious of their responsibilities as global
                                        citizens, guided by Ignatian discernment and rooted in a personal relationship with God, strongly oriented
                                        to faith and justice and critically rooted in their culture.
                                        <br>
                                        <br>
                                        Our desire is not being blinded by the radiant glow of their self-perceived greatness. A meditative reflection
                                        is essential for self-discernment and leads them to self-transformation to become lifelong learners who
                                        demonstrate critical concerns for the society.
                                    </p>
                                </div>
                                <div class="approach-section">
                                    <h2>Approach to Teaching (Competence)</h2>
                                    <p id="home-text">As an approach to teaching, actual student community engagement is integrated in the syllabus and forms part
                                        of the teaching methodology to achieve the learning objectives of a course or subject. The students’ engagements
                                        are based on needs expressed by partner communities by which they can possibly offer solutions and new perspectives
                                        <br>
                                        <br>
                                        The faculty is expected to craft rubrics for each area visit/work to assess how the learning objectives are achieved
                                        as the students progress in their engagement. Service learning components such as area work performance, final SL
                                        outputs, presentation of SL outputs to partner community, summative reflection, attendance during the processing
                                        session, are also integrated in the grading matrix.
                                    </p>

                                </div>

                                <div class="program-section">
                                    <h2>SLP Program Structure</h2>
                                    <p id="home-text">As a program, SLP is lodged under the Social Development Cluster and is run by a team of formators
                                        who provide oversight function in the preparation, implementation, and post-implementation of the students’ engagements.
                                        Below is the SL process of implementation in Xavier Ateneo:</p>
                                    <!-- Add more detailed information about the SL process here -->
                                    <ul>
                                        <li>Preparation: Oversight by a team of formators.</li>
                                        <li>Implementation: Integration of service learning components into curriculum.</li>
                                        <li>Post-Implementation: Evaluation and reflection on student engagements.</li>
                                    </ul>
                                    <img class="bgslp-image" src="assets\images\bgslp.png" alt="">
                                </div>

                                <div>
                                    <h2>Social Formation of students (Compassion)</h2>
                                    <p id="home-text">Service Learning as a tool for social formation, integral to Jesuit education, aims to develop leaders dedicated to a
                                        just and humane society. This approach aligns with Jesuit traditions, fostering qualities of mind and heart essential
                                        for collaborative work for the common good. It combines academic instruction with meaningful community service,
                                        consistent with Ignatian spirituality and the Jesuit mission of educating for justice. Through regular reflection,
                                        end-of-semester processing sessions, and mentoring, students deeply engage with their communities, gaining insights
                                        that challenge their preconceived notions and inspire active participation in societal change. As articulated by J.
                                        Kavanaugh in "Jesuit Higher Education," the essence of education is justice, grounded in human dignity and aimed at
                                        human freedom.
                                    </p>
                                </div>

                                <div>
                                    <h2>Achieve Sustainable Development (Contact)</h2>
                                    <p id="home-text">
                                        Since its institutionalization in 2016, XU-SLP has engaged more students and faculty in various communities and sectors
                                        in Cagayan de Oro City, in municipalities of Misamis Oriental and Bukidnon, and many of their barangays for discipline-based
                                        solutions and projects. The program also continues to explore other modes of SL implementation to evolve into more
                                        interdisciplinary engagements for community development.
                                    </p>
                                </div>

                                <table>
                                    <tr>
                                        <th>Academic Year</th>
                                        <th>Students Engaged</th>
                                        <th>Faculty</th>
                                        <th>Subjects</th>
                                        <th>Projects</th>
                                        <th>Partners</th>
                                    </tr>
                                    <tr>
                                        <td>2016-2017</td>
                                        <td>1,168</td>
                                        <td>24</td>
                                        <td>17</td>
                                        <td>36</td>
                                        <td>27</td>
                                    </tr>
                                    <tr>
                                        <td>2017-2018</td>
                                        <td>2,229</td>
                                        <td>53</td>
                                        <td>48</td>
                                        <td>48</td>
                                        <td>46</td>
                                    </tr>
                                    <tr>
                                        <td>2018-2019</td>
                                        <td>937*</td>
                                        <td>49</td>
                                        <td>39</td>
                                        <td>42</td>
                                        <td>28</td>
                                    </tr>
                                    <tr>
                                        <td>2022-2023</td>
                                        <td>1,057</td>
                                        <td>33</td>
                                        <td>31</td>
                                        <td>47</td>
                                        <td>31</td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

@yield('layout.footer')