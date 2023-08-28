const Header = ({ course }) => {
  return (
    <div>
      <h1>{course}</h1>
    </div>
  );
};
const Part1 = ({part1,exercises1}) =>{
  return(
    <div>
      <p>{part1} {exercises1}</p>
    </div>
  );
};
const Part2 = ({part2,exercises2}) =>{
  return(
    <div>
      <p>{part2} {exercises2}</p>
    </div>
  );
};
const Part3 = ({part3,exercises3}) =>{
  return(
    <div>
      <p>{part3} {exercises3}</p>
    </div>
  );
};
const Content = ({Part1, Part2, Part3}) => {
  return(
    <div>
    <Part1 part1="Fundamentals of React" exercises1={10} />
    <Part2 part2="Using props to pass data" exercises2={7} />
    <Part3 part3="State of a component" exercises3={14} />
    </div>
  );
};
const Total = ({exercises1, exercises2, exercises3}) => {
  return(
    <div>
      <p>Numeros de ejericios = {exercises1 + exercises2 + exercises3}</p>
    </div>
  );
};
const App = () => {
  const course = 'Half Stack application development'
  const part1 = 'Fundamentals of React'
  const exercises1 = 10
  const part2 = 'Using props to pass data'
  const exercises2 = 7
  const part3 = 'State of a component'
  const exercises3 = 14


  return (
    <div>
      <Header course={course}/>
      <Content Part1={Part1}
        Part2={Part2}
        Part3={Part3}/>
      <Total exercises1={exercises1}
        exercises2= {exercises2}
        exercises3= {exercises3} />
      </div>
  );
};

export default App